<?php

namespace App\Http\Resources\Expense;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'expense_id' => $this->id,
            'expense_item' => $this->expense_item,
            'amount' => $this->amount,
            'month' => $this->month,
            'date' => $this->date,
            'year' => $this->year,
            // 'href' => [
            //     'today' => url('admin/today_expense'),
            // ]
        ];
    }
}
