<template>
    <div>
        <div class="container">
            <div class="input-group">
                <form action="/barcode/generate" method="GET" class="" style="margin: auto"><br>
                    <p class="text-black text-center font-weight-bold h2">Создание кодов</p>
                    <br>
                    <input v-on:click="selectID=true" v-show="selectID == false" type="number" name="product_code"
                           v-bind:value="productId" class="form-control bg-light text-dark input-lg mb-4  pl-4"
                           style="height:50px" readonly="readonly" placeholder="Выберете ID продукта">
                    <input type="number" name="barcode_count" value=""
                           class="form-control bg-light text-dark input-lg mb-4  pl-4" style="height:50px"
                           placeholder="Кол-во">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Создать список"/>
                    <br><br>
                </form>
            </div>
        </div>
        <div v-show=selectID
             style="width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); position: fixed; left:0px; top:0px; z-index: 9999">
            <div class="rounded barcode-product-list">
                <div class="row pb-3 border-bottom">
                    <div class="col">Выберете ID продукта</div>
                    <div class="col-auto text-right" v-on:click="selectID=false">X</div>
                </div>

                <div class="row mt-2" style="height: 90%; overflow-y: auto; overflow-x: hidden">
                    <div class="col-12 col-sm-6 col-md-4 " v-on:click="idSelected(product['product_code'])"
                         v-for="product in products">
                        <div class="row barcode-product-item">
                            <div class="col-4 text-center">
                                <img class="img-fluid" style="max-height: 4rem" v-bind:src="product['product_photo']">
                            </div>
                            <div class="col d-flex flex-column justify-content-center">
                                {{product['product_code'] + '.' + product['product_name'] }}
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
        data: function () {
            return {
                selectID: false,
                productId: '',
                products: [],
                url: '/api/products/form'
            }
        },
        created: function () {
            axios.get(this.url).then((response) => {
                this.products = response.data;
            });
        },
        methods: {
            idSelected(id) {
                this.productId = id;
                this.selectID = false;
            }
        }
    }
</script>
