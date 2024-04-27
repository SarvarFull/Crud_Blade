<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get("/", [IndexController::class, "mainPage"])->name("main.page");
Route::post("add/people", [IndexController::class,"addPeople"])->name("add.people");
Route::get("view/people/{id}", [IndexController::class,"viewPeople"])->name("view.people");
Route::get("edit/people/{id}", [IndexController::class,"editPeople"])->name("edit.people");
Route::post("edit/people/{id}", [IndexController::class,"updatePeople"])->name("update.people");
Route::get("delete/people/{id}", [IndexController::class,"deletePeople"])->name("delete.people");
