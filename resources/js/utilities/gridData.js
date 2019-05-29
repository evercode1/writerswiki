
var dataHelper = {

    getQueryData(request, url, vm){



             url = this.formatUrlGetRequest(request, url, vm);


            if (vm.query == '' && url != null){

                $.getJSON(url, function (data) {

                    vm.gridData = data.data;
                    vm.total = data.total;
                    vm.last_page =  data.last_page;
                    vm.next_page_url = data.next_page_url;
                    vm.prev_page_url = data.prev_page_url;
                    vm.current_page = data.current_page;

                }.bind(vm));

            } else {

                if (url != null){

                    $.getJSON(url, function (data) {

                        vm.gridData = data.data;
                        vm.total = data.total;
                        vm.last_page =  data.last_page;
                        vm.next_page_url = (data.next_page_url == null) ? null : data.next_page_url + '&keyword=' +vm.query;
                        vm.prev_page_url = (data.prev_page_url == null) ? null : data.prev_page_url + '&keyword=' +vm.query;
                        vm.first_page_url = url + '?page=1&keyword=' +vm.query;
                        vm.last_page_url = url + '?page=' + vm.last_page + '&keyword=' +vm.query;
                        vm.current_page = data.current_page;
                        vm.resetPageNumbers();

                    }.bind(vm));

                }
            }
        },

        formatUrlGetRequest(request, url, vm){

            request = request || vm.current_page;


            let sortParams = '&column=' + vm.sortKey +
                             '&direction=' + vm.sortOrder;

            let searchParams = sortParams +
                               '&keyword=' + vm.query;




            switch (request){

                case vm.prev_page_url :

                    url = vm.prev_page_url + sortParams;

                    break;

                case vm.next_page_url :

                    url = vm.next_page_url + sortParams;

                    break;

                case vm.first_page_url :

                    url = vm.first_page_url + sortParams;

                    break;

                case vm.last_page_url :

                    url = vm.last_page_url + sortParams;

                    break;

                case vm.query :

                    url = url + '?' + searchParams;

                    break;

                case vm.go_to_page :

                    if( vm.go_to_page != '' && vm.pageInRange()){

                        url = url + '?' + 'page=' + vm.go_to_page + searchParams;

                        vm.clearPageNumberInputBox();

                    } else {

                        alert('Please enter a valid page number');

                    }

                    break;

                default :

                    url = url + '?' + 'page=' + request + sortParams + searchParams;

                    break;

            }


            return url;

        },
    
        loadData(url, vm) {


            $.getJSON(url,function (data) {

                vm.gridData = data.data;
                vm.total = data.total;
                vm.last_page =  data.last_page;
                vm.next_page_url = data.next_page_url;
                vm.prev_page_url = data.prev_page_url;
                vm.current_page = data.current_page;
                vm.first_page_url = url + '?page=1';
                vm.last_page_url = url + '?page=' + vm.last_page;
                vm.setPageNumbers();

            }.bind(vm));



            
        }

};


module.exports = dataHelper;
