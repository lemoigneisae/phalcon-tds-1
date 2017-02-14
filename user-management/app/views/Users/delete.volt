<div class="ui container" style="margin-top: 100px">



    {% for user in aUser %}
    {% if val == NULL %}
        <div class="ui error message">
            <div class="header">
                Vous allez supprimer :
            </div>
            <ul class="list">
                <li>{{ user.firstname }}  {{ user.lastname }}</li>
            </ul>
        </div>


    <button class="ui labeled icon button">
        <i class="delete icon"></i>
        {{ link_to("users/delete/"~user.getId()~"/k","Supprimer") }}
    </button>
    <button class="ui labeled icon button">
        <i class="stop icon"></i>
        {{ link_to("users/index","Retour à la liste") }}
    </button>
    {% endif %}

{% if val != NULL %}
    <div class="ui success message">
        <div class="header">
            User supprimé !
        </div>
        <ul class="list">
            <li>{{ user.firstname }}  {{ user.lastname }}</li>
        </ul>
    </div>
    <button class="ui labeled icon button">
        <i class="stop icon"></i>
        {{ link_to("users/index","Retour à la liste") }}
    </button>
    {% endif %}
    {% endfor %}
</div>