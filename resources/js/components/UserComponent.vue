<template>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>User List</strong></div>

                    <div class="card-body">
                        <div>
                          <p v-for="item in list" :key="item.id">
							<span>{{item.name}}</span>   <span>{{item.email}}</span>
                          </p>
                          <infinite-loading @distance="1" @infinite="infiniteHandler" spinner="bubbles"> <div slot="no-more"><b-alert v-model="showDismissibleAlert" variant="danger" dismissible>
      Dismissible Alert!
    </b-alert></div></infinite-loading>
                          <p> {{ error }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
              list: [],
              page: 1,

            };
          },
          methods: {
            infiniteHandler($state) {
                axios.get('http://127.0.0.1:8000/products?page='+this.page)
                   .then(( {data }) => {
                        if(data.data.length){$.each(data.data, (key, value)=> {
                                this.list.push(value);
                        });
                    $state.loaded();
                    }else{
                    $state.complete();

                    }

                    });

                this.page = this.page + 1;
            },
          },
    }
</script>
