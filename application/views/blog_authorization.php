	<form name="form_login" method="post">
		<input name="input_login" type="text" class = "text_box" placeholder="Введите логин"></input>
		<input name="input_password" type="text" placeholder="Введите пароль" autocomplete="off"></input>
		<button name="button_login" value="1" class="button">Войти</button>
		<?php if(isset($error_authorization)) echo $error_authorization;?>
	</form>
	<button class="button" value="1" onClick='location.href="registration"'>Зарегистрироваться</button>