@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-9">
        <h1>直近の予定</h1>
        <div class="row">
            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('img/makoto.jpg') }}" class="most-recent img-thumbnail">
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
                    <img src="{{ asset('img/makoto.jpg')}}" class="most-recent img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>新垣誠2</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <a href="#">
                    <img src="{{ asset('img/makoto.jpg')}}" class="most-recent img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>新垣誠3</label>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <h1>お客様一覧</h1>
        <div class="row">
            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/panasonic.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>お名前１</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/sofa.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>お名前２</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/item.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>お名前３</labiel>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#">
                    <img src="{{ asset('img/goods.png')}}" class="img-thumbnail">
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samazon-product-label mt-2">
                            <label>お名前４</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection