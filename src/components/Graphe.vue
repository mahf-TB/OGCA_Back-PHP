<template>
   <div class="row p-4">
        <div class="col">
            <div class="card" style="min-height: 485px">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Employees Stats</h4>
                    <p class="category">New employees on 15th December, 2016</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bob Williams</td>
                                <td>$23,566</td>
                                <td>USA</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mike Tyson</td>
                                <td>$10,200</td>
                                <td>Canada</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tim Sebastian</td>
                                <td>$32,190</td>
                                <td>Netherlands</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Philip Morris</td>
                                <td>$31,123</td>
                                <td>Korea, South</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Minerva Hooper</td>
                                <td>$23,789</td>
                                <td>South Africa</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Hulk Hogan</td>
                                <td>$43,120</td>
                                <td>Netherlands</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Angelina Jolie </td>
                                <td>$12,140</td>
                                <td>Australia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12">
            <div class="card" style="min-height: 485px">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Activities</h4>
                </div>
                <div class="card-content">
                    <div class="streamline">
                        <div class="sl-item sl-primary">
                            <div class="sl-content">
                                <small class="text-muted">5 mins ago</small>
                                <p>Williams has just joined Project X</p>
                            </div>
                        </div>
                        <div class="sl-item sl-danger">
                            <div class="sl-content">
                                <small class="text-muted">25 mins ago</small>
                                <p>Jane has sent a request for access to the project folder</p>
                            </div>
                        </div>
                        <div class="sl-item sl-success">
                            <div class="sl-content">
                                <small class="text-muted">40 mins ago</small>
                                <p>Kate added you to her team</p>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-content">
                                <small class="text-muted">45 minutes ago</small>
                                <p>John has finished his task</p>
                            </div>
                        </div>
                        <div class="sl-item sl-warning">
                            <div class="sl-content">
                                <small class="text-muted">55 mins ago</small>
                                <p>Jim shared a folder with you</p>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-content">
                                <small class="text-muted">60 minutes ago</small>
                                <p>John has finished his task</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Graphe',
    data() {
        return {
            
        }
    },
}
</script>