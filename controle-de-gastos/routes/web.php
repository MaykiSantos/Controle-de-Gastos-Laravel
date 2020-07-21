<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/controle-de-gastos', 'Dashboard@index')->middleware('auth');
Route::post('/controle-de-gastos/dados-mes', 'Dashboard@graficosPiza')->middleware('auth');
Route::post('/controle-de-gastos/dados-ultimo-ano', 'Dashboard@graficosLinha')->middleware('auth');
Route::post('/controle-de-gastos/dados-mes-barra', 'Dashboard@graficosBarra')->middleware('auth');

Route::get('/controle-de-gastos/novo-mes', 'NovoMes@index')->middleware('auth');
Route::get('/controle-de-gastos/registros-anos', 'RegistrosAno@index')->middleware('auth');
Route::get('/controle-de-gastos/{ano}', 'RegistrosMeses@index')->middleware('auth');
Route::get('/controle-de-gastos/{ano}/{mes}', 'DetalhesMes@index')->middleware('auth');

Route::post('/controle-de-gastos/{ano}/{mes}/salvar-receita', 'ManipularRegistro@salvarReceita')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/salvar-despesa', 'ManipularRegistro@salvarDespesa')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/salvar-reserva', 'ManipularRegistro@salvarReserva')->middleware('auth');

Route::post('/controle-de-gastos/{ano}/{mes}/editar-receita/{id}', 'ManipularRegistro@editarReceita')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/editar-despesa/{id}', 'ManipularRegistro@editarDespesa')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/editar-reserva/{id}', 'ManipularRegistro@editarReserva')->middleware('auth');

Route::post('/controle-de-gastos/{ano}/{mes}/apagar-receita/{id}', 'ManipularRegistro@apagaReceita')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/apagar-despesa/{id}', 'ManipularRegistro@apagaDespesa')->middleware('auth');
Route::post('/controle-de-gastos/{ano}/{mes}/apagar-reserva/{id}', 'ManipularRegistro@apagaReserva')->middleware('auth');

Route::post('/controle-de-gastos/criar-mes', 'CriaMes@criar')->middleware('auth');

