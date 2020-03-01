<div class=" col-sm-3">
    @if(Auth::user()->role == 1)
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link " href="{{route('add-user')}}">Add User</a>
    </div>
    @endif

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link " href="{{route('home')}}">Add Category</a>
        <a class="nav-link " href="{{route('view-category')}}">Manage Category</a>
    </div>

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link " href="{{route('add-product')}}">Add Product</a>
        <a class="nav-link " href="{{route('view-product')}}">Manage Product</a>
    </div>
</div>
