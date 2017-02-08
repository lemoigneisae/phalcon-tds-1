<div class="ui container">
    <div class="ui labeled input">
        <div class="ui label">
            <i class="add user icon"></i>
            Nouvel utilisateur...
        </div>
        <input type="text">
    </div>
<table class="ui sortable striped table">
    <thead>
    <tr>
        <th>
            <div class="ui checkbox">
                <input type="checkbox">
                <label></label>
            </div>
        </th>
        <th>{{ link_to(["for": "users", "page": 1, "sField": "firsname", "sens": "asc"],"Prénom") }}</th>
        <th class="">Nom</th>
        <th class="">Login</th>
        <th class="">Email</th>
        <th class="">Role</th>
        <th></th>

    </tr>
    </thead>
    <tbody>
        {% for user in utilisateurs %}
        <tr>
            <td>
                <div class="ui checkbox">
                    <input type="checkbox">
                    <label></label>
                </div>
            </td>
            <td>{{ user.firstname }}</td>
            <td>{{ user.lastname }}</td>
            <td>{{ user.login }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.getRole().getName() }}</td>
            <td><button class="ui red basic icon button">
                    <i class="edit icon"></i>
                </button>
                <button class="ui icon button">
                    <i class="remove icon"></i>
                </button>
            </td>
        </tr>
        {% endfor %}
    </tbody>
    <tfoot>
    <tr><th colspan="3">
            <div class="ui right floated pagination menu">
                <a class="icon item">
                    <i class="left chevron icon"></i>
                </a>
                <a class="item">1</a>
                <a class="item">2</a>
                <a class="item">3</a>
                <a class="item">4</a>
                <a class="icon item">
                    <i class="right chevron icon"></i>
                </a>
            </div>
        </th>
    </tr></tfoot>
</table>
</div>