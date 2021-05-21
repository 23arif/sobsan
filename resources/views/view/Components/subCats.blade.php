<div class="sub-category-filter">
    <header class="inner-sec-heading small">
        <h2>{{__('esas.altCat')}}</h2>
    </header>
    <div class="sub-category-container">
        @foreach($subCats as $cat)
            <div class="sub-category">
                <input class="form-check-input" type="checkbox" name="subcategory[]" value="{{$cat->id}}"/>
                <img src="{{asset('/public/CatImgs/'.$cat->img)}}" alt="office tool"/>
                <h3>{{$cat->getCat->where('lang',Session('lang'))->first()->name}}</h3>
            </div>
        @endforeach
    </div>
</div>
<hr/>
