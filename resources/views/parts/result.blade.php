
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow ">
            <div class="grid grid-cols-1 md:grid-cols-2 background">
                <div class="result">
                    <div class="tables">
                        <div class="content">
                            @include('parts.leaguetable')
                            @include('parts.matchresults')
                    </div>
                    @include('parts.predict-result')
                </div>
            </div>
        </div>

