<div class="ui container">

    <button class="ui labeled icon button">
        <i class="user icon"></i>
        {{ link_to("/users/index","Retour à la liste") }}
    </button>

    <table class="ui celled table">

        <tbody>

    {% for user in aUser %}
        <tr>
            <td class="active">Prénom</td>
            <td>{{ user.firstname }}</td>
        <tr/>
        <tr>
            <td class="active">Nom</td>
            <td>{{ user.lastname }}</td>
        <tr/>
        <tr>
            <td class="active">Login</td>
            <td><div class="ui label">
                    <i class="mail icon"></i> {{ user.login }}
                </div></td>
        <tr/>
        <tr>
            <td class="active">Adresse mail</td>
            <td>{{ user.email }}</td>
        <tr/>
        <tr>
            <td class="active">Rôle</td>
            <td>{{ user.getRole().getName() }}</td>
        <tr/>
    {% endfor %}

        </tbody>
    </table>

</div>