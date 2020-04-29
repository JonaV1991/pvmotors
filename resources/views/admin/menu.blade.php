<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
          	@if(auth()->user()->admin)
          	<li class="nav-item has-treeview">
          		<a href="{{ route('dashboard') }}" class="nav-link active">
          			<i class="nav-icon fas fa-tachometer-alt"></i>
          			<p>
          				Dashboard
          				<i class="right fas fa-angle-left"></i>
          			</p>
          		</a>
          	</li>
          	@endif
          	@if(auth()->user()->admin)
          	<li class="nav-item has-treeview">
          		<a href="{{ route('perfil_cliente') }}" class="nav-link">
          			<i class="nav-icon fas fa-users"></i>
          			<p>
          				Clientes
          				<i class="right fas fa-angle-left"></i>
          			</p>
          		</a>
          	</li>
          	@endif
          	@if(auth()->user()->admin)
          	<li class="nav-item has-treeview">
          		<a href="{{ route('inventario') }}" class="nav-link">
          			<i class="nav-icon fas fa-car-crash"></i>
          			<p>
          				Inventario
          				<i class="right fas fa-angle-left"></i>
          			</p>
          		</a>
          	</li>
          	@endif
               @if(auth()->user()->admin)
               <li class="nav-item has-treeview">
                    <a href="{{ route('cotizaciones') }}" class="nav-link">
                         <i class="nav-icon fas fa-pencil-alt"></i>
                         <p>
                              Cotizaciones
                              <i class="right fas fa-angle-left"></i>
                         </p>
                    </a>
               </li>
               @endif
               <li class="nav-item has-treeview">
                    <a href="{{ route('cotizar') }}" class="nav-link">
                         <i class="nav-icon fas fa-cogs""></i>
                         <p>
                              Cotizar
                              <i class="right fas fa-angle-left"></i>
                         </p>
                    </a>
               </li>
               <li class="nav-item has-treeview">
                    <a href="{{ route('servicios') }}" class="nav-link">
                         <i class="nav-icon fas fa-oil-can"></i>
                         <p>
                              Servicios
                              <i class="right fas fa-angle-left"></i>
                         </p>
                    </a>
               </li>
               <li class="nav-item has-treeview">
                    <a href="{{ route('contactos') }}" class="nav-link">
                         <i class="nav-icon fas fa-route"></i>
                         <p>
                              Contactos
                              <i class="right fas fa-angle-left"></i>
                         </p>
                    </a>
               </li>
          	@if(auth()->user()->admin)
          	<li class="nav-item has-treeview">
          		<a href="{{ route('pedidos') }}" class="nav-link">
          			<i class="nav-icon fas fa-list-alt"></i>
          			<p>
          				Pedidos
          				<i class="right fas fa-angle-left"></i>
          			</p>
          		</a>
          	</li>
          	@endif
    </ul>
</nav>
<!-- /.sidebar-menu -->