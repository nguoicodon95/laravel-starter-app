@if(Auth::check())
  <li>
    <?php $params = Auth::user()->username; ?>
    <a href="/logout">
      <span class="menu-text">Logout</span>
    </a>
  </li>
@endif