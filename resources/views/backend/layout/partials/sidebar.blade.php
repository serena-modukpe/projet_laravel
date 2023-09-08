<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

  <!--li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#roles-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layers-half"></i><span>Rôles </span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="roles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('roles.index') }}">
          <i class="bi bi-circle"></i><span>Liste rôles </span>
        </a>
      </li>
      <li>
        <a href="{{ route('roles.create') }}">
          <i class="bi bi-circle"></i><span>Ajouter</span>
        </a>
      </li>
      
    </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#statut-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layers-half"></i><span> Statut</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="statut-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('statuts.index') }}">
          <i class="bi bi-circle"></i><span>Liste statut</span>
        </a>
      </li>
      <li>
        <a href="{{ route('statuts.create') }}">
          <i class="bi bi-circle"></i><span>Ajouter statut</span>
        </a>
      </li>
      
    </ul>
  </li>




  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#payements-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layers-half"></i><span>Rôles payement</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="payements-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('payements.index') }}">
          <i class="bi bi-circle"></i><span>Liste rôles</span>
        </a>
      </li>
      <li>
        <a href="{{ route('payements.create') }}">
          <i class="bi bi-circle"></i><span>Ajouter rôles payement</span>
        </a>
      </li>
      
    </ul>
  </li>






  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#inscriptions-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layers-half"></i><span>Rôles inscription</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="inscriptions-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('inscriptions.index') }}">
          <i class="bi bi-circle"></i><span>Liste rôles</span>
        </a>
      </li>
      <li>
        <a href="{{ route('inscriptions.create') }}">
          <i class="bi bi-circle"></i><span>Ajouter roles inscription</span>
        </a>
      </li>
      
    </ul>
  </li-->



  


 









  
@if(Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2)
<li class="nav-item">
    <a class="nav-link " href="{{ route('classeeleves.index') }}">
    <i class="bi bi-link"></i>
      <span>Mes eleves</span>
    </a>
  </li>



  <li class="nav-item">
    <a class="nav-link " href="{{ route('parametre') }}">
    <i class="bi bi-gear"></i>
      <span>Paramètres</span>
    </a>
  </li>
  @else  

  <li class="nav-item">
    <a class="nav-link " href="{{ route('parametre') }}">
    <i class="bi bi-gear"></i>
      <span>Paramètres</span>
    </a>
  </li>

  @if(Auth::user()->getrole->id == 1)
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layers-half"></i><span>utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    
    <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    
    <li>
    
        <a href="{{ route('users.index') }}">
        <i class="bi bi-person"> </i>
        <span>Liste utilisateurs </span>
        </a>
 
    </ul>
    @else
    @endif

   




    









    
    @endif
    
    <li class="nav-item">
    <a class="nav-link " href="{{ route('changermotdepasse') }}">
    <i class="bi bi-pencil-square"></i>
      <span>Changer mot de passe</span>
    </a>
  </li>



  <li class="nav-item">
      <a  class="nav-link" href="{{ route('signout') }}">         
      <span>Déconnexion</span>
      </a>
    </li>


   

  

</ul>




</aside><!-- End Sidebar-->