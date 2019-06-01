<template>

    <div class="row">

        <div>

            <h1 class="flow-text grey-text text-darken-1">Users</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section>


                <div class="row">

                    <table>

                        <table-head></table-head>

                        <tbody>

                        <tr v-for="row in gridData">

                            <td>

                                   {{ row.Id }}

                            </td>

                            <td>

                                <a v-bind:href="'/user/' + row.Id + '/edit'"> {{ row.Name }}</a>

                            </td>

                            <td>

                                <a v-bind:href="'/user/' + row.Id + '/edit'"> {{ row.Email }}</a>

                            </td>

                            <td>

                                {{ showStatus(row.Status) }}

                            </td>


                            <td>

                                {{ showSubscribed(row.Subscribed) }}

                            </td>

                            <td>

                                {{ showAdmin(row.Admin) }}

                            </td>



                            <td>

                                   {{ row.Joined }}

                            </td>

                            <td >

                                <a v-bind:href="'/user/' + row.Id + '/edit'">

                                <button type="button" class="btn waves-effect waves-light">

                                        Edit

                                </button>

                                </a>

                            </td>

                        </tr>

                        </tbody>

                    </table>

                </div>

                <page-number></page-number>

            </section>

            <pagination></pagination>

        </div>

    </div>

</template>

<script>

    var gridData = require('../utilities/gridData');


    export default {

        components: {'pagination' : require('./Pagination'),
                     'search-box' : require('./SearchBox'),
                     'grid-count' : require('./GridCount'),
                     'page-number' : require('./PageNumber'),
                     'table-head' : require('./TableHead')},

        mounted: function () {

            gridData.loadData('api/user-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Name', 'Email', 'Status', 'Subscribed','Admin', 'Joined'],
                gridData: [],
                total: null,
                next_page_url: null,
                prev_page_url: null,
                last_page: null,
                current_page: null,
                pages: [],
                first_page_url: null,
                last_page_url: null,
                go_to_page: null,
                sortOrder: 1,
                sortKey: 'id',
                createUrl: '/user/create',
                showCreateButton: false
            }
        },

        methods: {

            sortBy: function (key){
                this.sortKey = key;
                this.sortOrder = (this.sortOrder == 1) ? -1 : 1;
                this.getData(1);
            },

            search: function(query){
                this.getData(query);
            },


            getData:  function(request){

                gridData.getQueryData(request, 'api/user-data', this);

            },

            setPageNumbers: function(){

                this.pages = [];

                for (var i = 1; i <= this.last_page; i++) {
                    this.pages.push(i);
                }
            },

            checkPage: function(page){
                return page == this.current_page;
            },

            resetPageNumbers: function(){

                this.setPageNumbers();
            },

            checkUrlNotNull: function(url){
                return url != null;
            },

            clearPageNumberInputBox: function(){
                return this.go_to_page = '';
            },

            pageInRange: function(){
                return this.go_to_page <= parseInt(this.last_page);
            },

            showStatus: function(status){

                return status == 10 ? 'Active'  : 'Inactive';

            },

            showAdmin: function(admin){

                return admin == 1 ? 'Yes'  : 'No';

            },

            showSubscribed: function(subscribed){

                return subscribed == 1 ? 'Yes'  : 'No';

            }

        }

    }

</script>