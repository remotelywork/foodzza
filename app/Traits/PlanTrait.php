<?php

namespace App\Traits;

use App\Enums\TxnType;
use App\Enums\TxnStatus;
use App\Facades\Txn\Txn;

trait PlanTrait 
{
    public function executePlanPurchaseProcess($user,$plan)
    {   
        // Old plan remaining days convert in credit and added to user balance 
        $this->processRefundCreditForRemainingDays($user);

        // Assign new plan to user
        $user->validity_at = now()->addDays($plan->validity);
        $user->plan_id = $plan->id;
        $user->save();
    }

    public function processRefundCreditForRemainingDays($user)
    {
        $currentDate = now();
        $oldPlanEndDate = now()->parse($user->validity_at);
        $currentPlan = $user->plan;
        $remainingDays = $oldPlanEndDate->diffInDays($currentDate);

        if($user->plan_id != null && $remainingDays > 0){
            $dailyCost = $currentPlan->price / $currentPlan->validity;
            $creditAmount = $dailyCost * $remainingDays;
            (new Txn)->new($creditAmount, 0, $creditAmount, 'system', 'Remaining Days Credit Added From Old Plan', TxnType::Refund, TxnStatus::Success, null, null, $user->id);
            $user->increment('balance',$creditAmount);
        }
    }
}