@if(Auth::check())
	<?php $params = Auth::user()->username; ?>
	<p class="text-right">
		<a href="/logout">
		  <span class="menu-text">Logout</span>
		</a>
	</p>
@endif