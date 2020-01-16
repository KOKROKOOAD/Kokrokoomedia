<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Manage Admin</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">

                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Default Styling table start -->
            <div class="card">
                <search></search>
                <!--                <div class="card-header">-->
                <!--                    &lt;!&ndash;<h5>Default Styling</h5>&ndash;&gt;-->
                <!--                    &lt;!&ndash;<span>use class <code>table table-styling</code> inside table element</span>&ndash;&gt;-->

                <!--                </div>-->
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Title</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>Joojo Arthur</td>
                                <td>jarthur@nalosolutions.com</td>
                                <td>0244560186</td>
                                <td>App support</td>
                                <td>Admin</td>
                                <td>Active</td>
                                <td>2019-01-23</td>
                                <td>2019-04-26</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target=".bd-example-modal-lg1"><i class="feather icon-activity"> </i></button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="feather icon-"> </i> </button>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <pagination></pagination>

    </div>
</template>

<script>
    export default {
        name: "manageAdmins"
    }
</script>

<style scoped>

</style>