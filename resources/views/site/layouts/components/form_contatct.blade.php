<form action="{{ route('web.contact') }}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $class }}">
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="contact_type" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="message" class="{{ $class }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
