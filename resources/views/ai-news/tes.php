<ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="navbar-left" role="search" method="get" action="{{ route('ai-news.index') }}">
                <div class="container row">
                    <div class="form-group col-md-10 col-sm-10 col-xs-10">
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request('q') }}">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: -15px;">
                    <button type="submit" class="btn btn-default">
                        <i class="bi bi-search"></i>
                    </button>
                    </div>
                </div>
                </form>
            </li>
            </ul>