<div>
    
    
    
    <div class="row">
        <div class="col-md-12">
            <table>
                <tr>
                    <th>Duration</th>
                    <th>User Count</th>
                </tr>
                <tr>
                    <th>Today</th>
                    <td>{{$this->perform_query('today')}}</td>
                </tr>
                <tr>
                    <th>Yestarday</th>
                    <td>{{$this->perform_query('yesterday')}}</td>
                </tr>
                <tr>
                    <th>This week</th>
                    <td>{{$this->perform_query('this_week')}}</td>
                </tr>
                <tr>
                    <th>Last week</th>
                    <td>{{$this->perform_query('last_week')}}</td>
                </tr>
                <tr>
                    <th>This month</th>
                    <td>{{$this->perform_query('this_month')}}</td>
                </tr>
                <tr>
                    <th>Last month</th>
                    <td>{{$this->perform_query('last_month')}}</td>
                </tr>
                <tr>
                    <th>This year</th>
                    <td>{{$this->perform_query('this_year')}}</td>
                </tr>
                <tr>
                    <th>Last year</th>
                    <td>{{$this->perform_query('last_year')}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>