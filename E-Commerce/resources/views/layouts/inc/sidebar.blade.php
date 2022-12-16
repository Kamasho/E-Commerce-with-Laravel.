<div class="sidebar bg-dark" style="border-radius: 20px;" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Uhakika Shopping
      </a></div>
      <hr>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }} ">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i style="color: white;" class="fa fa-tachometer" aria-hidden="true"></i>
            <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('category') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('category') }}">
            <i style="color: white;" class="fa fa-list" aria-hidden="true"></i>
            <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('add-category') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('add-category') }}">
                <i style="color: white;" class="fa fa-plus" aria-hidden="true"></i>
              <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Add Category</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('products') }}">
                <i style="color: white;" class="fa fa-list" aria-hidden="true"></i>
              <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Products</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-product') ? 'active':'' }}">
              <a class="nav-link" href="{{ url('add-product') }}">
                <i style="color: white;" class="fa fa-plus" aria-hidden="true"></i>
                <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Add Product</p>
              </a>
            </li>
        <li class="nav-item ">
          <a class="nav-link" href="./tables.html">
            <i style="color: white;" class="material-icons">content_paste</i>
            <p style="color:aliceblue; font-weight: 500; font-family:cursive;">Table List</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
