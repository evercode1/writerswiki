<template>

    <div class="row">



        <h1 class="flow-text grey-text text-darken-1">Expressions For {{ this.emotion }}</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section class="mt-20">


                <div class="row">

                    <table>

                        <all-table-head></all-table-head>

                        <tbody>

                        <tr v-for="row in gridData">


                            <td>

                                <a v-bind:href="'/expression/' + row.Id + '-' + row.Slug"> {{ row.Label }}</a>

                            </td>


                            <td>

                                {{ row.Emotion }}

                            </td>

                            <td>

                                <a v-bind:href="'/profile/' + row.Profile"> {{ row.Contributor }}</a>


                            </td>



                        </tr>

                        </tbody>

                    </table>

                </div>

                <page-number></page-number>

            </section>

            <pagination></pagination>



    </div>

</template>

<script>

    var gridData = require('../utilities/gridData');

        import Pagination from './Pagination';
        import SearchBox from './SearchBox';
        import GridCount from './GridCount';
        import PageNumber from './PageNumber';
        import TableHead from './TableHead';


    export default {

        props:  ['type', 'emotion'],

        components: {'pagination' : Pagination,
                     'search-box' : SearchBox,
                     'grid-count' : GridCount,
                     'page-number' : PageNumber,
                     'table-head' : TableHead },

        mounted: function () {

            gridData.loadData('/api/emotion-expression-data/' + this.type, this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Label', 'Emotion', 'Contributor'],
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
                createUrl: '/expression-preset/create/' + this.type,
                showCreateButton: true
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

                gridData.getQueryData(request, '/api/emotion-expression-data/' + this.type, this);

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

                formatActive: function(active){

                    return  active === 1 ? 'Active' : 'Inactive';

            },

            confirmDelete: function(id){

                if(confirm("Are you sure you want to delete?")){

                    axios.post('/expression-delete/' + id)
                            .then(response => {

                                gridData.loadData('/api/emotion-expression-data/' + this.type, this);

                            });


                }



            }


        }

    }

</script>