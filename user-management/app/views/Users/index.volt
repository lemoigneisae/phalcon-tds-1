<div class="ui container">
    <div class="ui icon menu">
        {{link_to("users/add", "
        <i class='user add icon icon'></i>&nbsp;Nouvel utilisateur
        ", 'class': 'item')}}

        <div class="ui category search item">
            <div class="ui transparent icon input">
                <form method="get">
                    <input name="filtre" class="prompt" type="text" placeholder="Rechercher...">
                    <i class="search link icon"></i>
                </form>
            </div>
        </div>
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
        {% if sens == "desc" and sField == "firstname"%}
        <th class="sorted descending">{{ link_to("users/index/"~pager.current~"/firstname/asc/","Prénom") }}</th>
        {% else %}
        <th>{{ link_to("users/index/"~pager.current~"/firstname/desc/","Prénom") }}</th>
        {% endif %}

        {% if sens == "desc" and sField == "lastname"%}
            <th class="sorted descending">{{ link_to("users/index/"~pager.current~"/lastname/asc/","Nom") }}</th>
        {% else %}
            <th>{{ link_to("users/index/"~pager.current~"/lastname/desc/","Nom") }}</th>
        {% endif %}

        {% if sens == "desc" and sField == "login"%}
            <th class="sorted descending">{{ link_to("users/index/"~pager.current~"/login/asc/","Login") }}</th>
        {% else %}
            <th>{{ link_to("users/index/"~pager.current~"/login/desc/","Login") }}</th>
        {% endif %}

        {% if sens == "desc" and sField == "email"%}
            <th class="sorted descending">{{ link_to("users/index/"~pager.current~"/email/asc/","Email") }}</th>
        {% else %}
            <th>{{ link_to("users/index/"~pager.current~"/email/desc/","Email") }}</th>
        {% endif %}

        {% if sens == "desc" and sField == "role"%}
            <th class="sorted descending">{{ link_to("users/index","Role") }}</th>
        {% else %}
            <th>{{ link_to("users/index","Role") }}</th>
        {% endif %}

        <th></th>
    </tr>
    </thead>
    <tbody>
        {% for user in pager.items %}
        <tr>
            <td>
                <div class="ui checkbox">
                    <input type="checkbox">
                    <label></label>
                </div>
            </td>
            <td class="selectable">{{ link_to("users/show/"~user.id~"",user.firstname) }}</td>
            <td class="selectable">{{ link_to("users/show/"~user.id~"",user.lastname) }}</td>
            <td>{{ user.login }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.getRole().getName() }}</td>
            <td>
                {{linkTo("users/edit/"~user.getId(), "<i class='bordered edit icon'></i>")}}
                {{linkTo("users/delete/"~user.getId(), "<i class='bordered red remove icon'></i>")}}

            </td>
        </tr>
        {% endfor %}
    </tbody>
    <tfoot>
    <tr><th colspan="3">
            <div class="ui right floated pagination menu">
                {% if pager.current == 1 %}
                    {{ link_to("users/index/"~pager.before~"/"~sField~"/"~sens~"/","<", 'class': 'item') }}
                    {{ link_to("users/index/"~pager.current~"/"~sField~"/"~sens~"/",pager.current, 'class': 'item') }}
                    {{ link_to("users/index/"~pager.next~"/"~sField~"/"~sens~"/",pager.next, 'class': 'item') }}
                    {{ link_to("users/index/"~pager.next~"/"~sField~"/"~sens~"/",">", 'class': 'item') }}
                {% else %}
                    {% if pager.current == pager.last %}
                        {{ link_to("users/index/"~pager.before~"/"~sField~"/"~sens~"/","<", 'class': 'item') }}
                        {{ link_to("users/index/"~pager.before~"/"~sField~"/"~sens~"/",pager.before, 'class': 'item') }}
                        {{ link_to("users/index/"~pager.current~"/"~sField~"/"~sens~"/",pager.current, 'class': 'item') }}
                        {{ link_to("users/index/"~pager.next~"/"~sField~"/"~sens~"/",">", 'class': 'item') }}
                        {% else %}
                            {{ link_to("users/index/"~pager.before~"/"~sField~"/"~sens~"/","<", 'class': 'item') }}
                            {{ link_to("users/index/"~pager.before~"/"~sField~"/"~sens~"/",pager.before, 'class': 'item') }}
                            {{ link_to("users/index/"~pager.current~"/"~sField~"/"~sens~"/",pager.current, 'class': 'item') }}
                            {{ link_to("users/index/"~pager.next~"/"~sField~"/"~sens~"/",pager.next, 'class': 'item') }}
                            {{ link_to("users/index/"~pager.next~"/"~sField~"/"~sens~"/",">", 'class': 'item') }}
                        {% endif %}
                {% endif %}

            </div>
        </th>
    </tr></tfoot>
</table>
</div>