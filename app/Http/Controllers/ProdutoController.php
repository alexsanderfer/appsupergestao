<?php

namespace App\Http\Controllers;

use App\{Fornecedor, Produto, ProdutoDetalhe, Item, Unidade};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(20);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres.',
            'descricao.max' => 'O campo descrição deve ter no máximo 40 caracteres.',
            'peso.integer' => 'O campo peso deve ser um número inteiro.',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Produto $produto
     * @return Application|Factory|View
     */
    public function show(Produto $produto)
    {
        // dd($produto);
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Produto $produto
     * @return Application|Factory|View
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Item $produto
     * @return RedirectResponse
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres.',
            'descricao.max' => 'O campo descrição deve ter no máximo 40 caracteres.',
            'peso.integer' => 'O campo peso deve ser um número inteiro.',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
        $request->validate($regras, $feedback);
        // dd($request->all());
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Produto $produto
     * @return RedirectResponse
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
