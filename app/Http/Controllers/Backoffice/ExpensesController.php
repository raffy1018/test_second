<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpensesController extends Controller
{
    public function index() {
        // need validation

        return view('backoffice.expenses.index');
    }

    public function create() {
        // need validation

        $expense = new Expense;

        return view('backoffice.expenses.create', compact('expense'));
    }

    public function store() {
        // need validation

        $expense = new Expense;

        $expense->fill(request()->all());
        $expense->save();

        return redirect()->route('backoffice.transactions.expenses.index');
    }

    public function edit(Expense $expense) {

        return view('backoffice.expenses.edit', compact('expense'));
    }

    public function update(Expense $expense) {
        // need validation

        $expense->fill(request()->all());
        $expense->save();

        return redirect()->route('backoffice.transactions.expenses.index');
    }

    public function destroy(Expense $expense) {
        $expense->delete();

        return redirect()->route('backoffice.transactions.expenses.index');
    }
}
