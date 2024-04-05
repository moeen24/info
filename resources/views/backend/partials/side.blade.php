<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="#">Admin Panel</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="#">Elite</a>
		</div>
		<ul class="sidebar-menu">
			<li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('admin.dashboard')}}"><i class="fas fa-home"></i><span>Home</span></a>
			</li>
			<li class="{{ Route::is('header.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('header.index')}}"><i class="fas fa-home"></i><span>Header Of Form</span></a>
			</li>

		</ul>

	</aside>
</div>