<template>


    <div>
        <ul id="nav-mobile" class="right">
            <li class="">
                <a href="/support-messages"
                   v-bind:class="isActive"
                   data-target="dropdown1"
                   class="dropdown-trigger waves-effect">
                   <i v-bind:class="isActive">notifications</i>
                </a>
            </li>
        </ul>

        <div id="dropdown1" class="dropdown-content notifications">
            <div class="notifications-title">notifications</div>
            <div class="card">
                <div class="card-content"><span class="card-title">You have New Support Replies</span>
                    <p></p>
                </div>
                <div class="card-action"><a href="/support-messages">view</a><a href="/home">home</a></div>
            </div>

        </div>




    </div>




</template>

<script>

    export default {


        mounted: function () {

            this.loadData();

        },

        data: function () {
            return {

                count: '',

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/alarm-data').then( (response) => {

                    this.count = response.data;

                });

            }

        },

        computed:
        {
            isActive(){


                return this.count ? 'alarm material-icons' : 'no-alarm material-icons';

            }

        }
    }
</script>

<style>

    .alarm {

        color: #ff42c9;
    }

    a.alarm:hover {

        color: white;
    }

    .no-alarm {

        color: #141818;
    }

    a.no-alarm:hover {

        color: #5f5eff;
    }

</style>