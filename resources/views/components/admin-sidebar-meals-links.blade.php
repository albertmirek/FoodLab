<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jídla</h6>
            <a class="collapse-item" href="{{route('meal.create')}}">Vytvořit jídlo</a>
            <a class="collapse-item" href="{{route('meal.index')}}">Zobrazit všechna jídla</a>
        </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nabídka</h6>
            <a class="collapse-item" href="{{route('menu.create')}}">Vytvořit nabídku</a>
            <a class="collapse-item" href="{{route('menu.index')}}">Všechny nabídky</a>
        </div>
    </div>
</li>
