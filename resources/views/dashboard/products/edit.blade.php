@extends('layouts.dashboard')
  
  @section('content')
  <div class="w-50">
      <h1>商品編集</h1>
  
      <hr>

      <form method="POST" action="/dashboard/products/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-name" class="col-2 d-flex justify-content-start">顧客名</label>
              <input type="text" name="name" id="product-name" class="form-control col-8" value="{{ $product->name }}" disabled>
              <input type="hidden" name="h_name" value="{{ $product->name }}">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-price" class="col-2 d-flex justify-content-start">価格</label>
              <input type="number" name="price" id="product-price" class="form-control col-8" value="{{ $product->price }}">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-category" class="col-2 d-flex justify-content-start">カテゴリ</label>
              <select name="category_id" class="form-control col-8" id="product-category">
                  @foreach ($categories as $category)
                  @if ($category->id == $product->category_id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                  @endforeach
              </select>
          </div>
          <div class="form-inline mt-4 mb-4 row">
            {{ csrf_field() }}
            <label for="product-deposit" class="col-2 d-flex justify-content-start">入金済</label>
            <input type="number" name="deposit" id="product-deposit" class="form-control col-6" value="{{ $product->deposit }}" disabled>
            <div class="class=form-control col-2 input-group-append">
                <a href="/payments/{{ $product->id }}/create" class="btn btn-primary">入金を更新</a>
            </div>
          </div>
          <!-- <div class="form-inline mt-4 mb-4 row">
              <label class="col-2 d-flex justify-content-start">画像</label>
              @if ($product->image !== null)
                 <img src="{{ asset('storage/products/'.$product->image) }}" id="product-image-preview" class="img-fluid w-25">
              @else
                 <img src="#" id="product-image-preview">
              @endif
              <div class="d-flex flex-column ml-2">
                  <small class="mb-3">600px×600px推奨。<br>商品の魅力が伝わる画像をアップロードして下さい。</small>
                  <label for="product-image" class="btn samazon-submit-button">画像を選択</label>
                  <input type="file" name="image" id="product-image" onChange="handleImage(this.files)" style="display: none;">
              </div>
          </div> -->
          <!-- <div class="form-inline mt-4 mb-4 row">
              <label for="product-price" class="col-2 d-flex justify-content-start">オススメ?</label>
              @if ($product->recommend_flag)
              <input type="checkbox" name="recommend" id="product-recommend" class="samazon-check-box" checked>
              @else
              <input type="checkbox" name="recommend" id="product-recommend" class="samazon-check-box">
              @endif
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-carriage" class="col-2 d-flex justify-content-start">送料</label>
              @if ($product->carriage_flag)
              <input type="checkbox" name="carriage" id="product-carriage" class="samazon-check-box" checked>
              @else
              <input type="checkbox" name="carriage" id="product-carriage" class="samazon-check-box">
              @endif
          </div> -->
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-description" class="col-2 d-flex justify-content-start align-self-start">商品説明</label>
              <textarea name="description" id="product-description" class="form-control col-8" rows="10">{{ $product->description }}</textarea>
          </div>
          <div class="d-flex justify-content-end">
              <button type="submit" class="w-25 btn samazon-submit-button">更新</button>
          </div>
      </form>
      <div class="row">
        <div class="justify-content-end">
            <a href="/dashboard/products">商品一覧に戻る</a>
        </div>
        <div class="justify-content-end mx-5">
            <a href="/payments/{{$product->user_id}}">入金一覧</a>
        </div>
      </div>
     
  </div>

 <script type="text/javascript">
     function handleImage(image) {
         let reader = new FileReader();
         reader.onload = function() {
             let imagePreview = document.getElementById("product-image-preview");
             imagePreview.src = reader.result;
         }
         console.log(image);
         reader.readAsDataURL(image[0]);
     }
  </script>
  @endsection