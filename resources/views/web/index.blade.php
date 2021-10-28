@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-9">
        <h1>直近の案件</h1>
        <div class="row">
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('img/makoto.jpg') }}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>新垣誠</label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>新垣誠２</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>太郎</label>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <h1>顧客一覧</h1>
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>顧客１</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>顧客２</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>顧客３</labiel>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/man.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            
                            <label>顧客３</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection