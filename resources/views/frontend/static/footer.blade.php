
</div>
      <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('frontend/js/format.js')}}"></script>
      @yield('js')
    <script>
        function tableViews(cart = null, id){
            $('#Cart').text(id)
            $('#navbarSupportedContent .ml-auto li').addClass('border border-danger')
            $('#navbarSupportedContent .ml-auto li .nav-link i').addClass('text-danger')
            $('#navbarSupportedContent .ml-auto li .nav-link small').addClass('text-danger')
        }
        $(document).ready(function(){
            const jancok = localStorage.getItem('products');
            let cart = JSON.parse(jancok)
            if(jancok != null){
                tableViews(cart, cart.length)
            }
            console.clear();
        })
        
        $(document).on('click','.addToCart', async function(){
            
            const datas = JSON.parse(localStorage.getItem('products'))
            
            let id = $(this).attr('data-id')
            let harga = $(this).attr('data-harga')
            let qty = $(this).attr('data-qty')
            let name = $(this).attr('data-name')
            let image = $(this).attr('data-image') 
           
            
            
            if(datas !== null){
                const findDataBungkus = function (myBungkus, id) {
                    const index = myBungkus.findIndex(function (bungkus, index) {
                        return bungkus.id === id;
                    });
                    return myBungkus[index];
                };
                const dataFind = await findDataBungkus(datas, id);
                if(dataFind){
                    const datasS = await datas.filter((item) => {
                        if (item.id === dataFind.id) {
                            item.qty = JSON.stringify(parseFloat(item.qty) + 1)
                            return item;
                        } else {
                            return item;
                        }});
                    localStorage.setItem('products', JSON.stringify(datasS));
                    tableViews(datasS ,datas.length)
                } else {
                    localStorage.setItem('products', JSON.stringify([...datas,{id,image,name,harga,qty}]));
                    tableViews([...datas,{id,name,harga,qty}],datas.length + 1)
                }
            } else {
                localStorage.setItem('products', JSON.stringify([{id,image,name,harga,qty}]));
                tableViews([{id,name,image,harga,qty}],1)
            }
        })

        //  Modal
        $(document).on('click', 'a[data-toggle=modal], button[data-toggle=modal]',function(){
            const datas = JSON.parse(localStorage.getItem('products'))
                const id = $(this).attr('data-id');
                let harga = $(this).attr('data-harga')
                let name = $(this).attr('data-name')
                let image = $(this).attr('data-image')
                let desc = $(this).attr('data-desc')
                let imageArray = $(this).attr('data-imageArr')
                $('#imageModal').css('background',`url(${image})`)
                $('#title').text(name)
                $('#pricemodal').text(Format_Rupiah_Final(harga))
                $('#hargaModal').val(harga)
                $('#imageModal').val(image)
                $('#descModal').text(desc)
                let data_qty = 0;
                let data_id = 0;
                if(datas != null){
                    const findDataBungkus = datas.filter((item, i) => {
                        if(item.id === id){
                            data_qty = item.qty
                            data_id = id
                        }
                    })
                findDataBungkus

                    $('.valueQTY').val(data_qty);
                    $('.valueId').val(id);
                }
        })
        $(document).on('click', '.modalAdd',async function(){
            const datas = JSON.parse(localStorage.getItem('products'))
            const valueQTY = $('#valueQTY').val()
            const id = $('#valueId').val()
            const name = $('#title').text()
            const harga = $('#hargaModal').val()
            const image = $('#imageModal').val()
            if(valueQTY > 0){
                AddToCart(id, name, harga, image, valueQTY, datas, "modal")
            } else {
                alert("Tentukan qty produk")
            }
            
        })
        async function AddToCart(id, name, harga, image, valueQTY, datas, type){
            if(datas != null){
                const findDataBungkus = function (myBungkus, id) {
                    const index = myBungkus.findIndex(function (bungkus, index) {
                        return bungkus.id === id;
                    });
                    return myBungkus[index];
                };
                const dataFind = await findDataBungkus(datas, id);
                if(dataFind){
                    const findDataLocal = await datas.filter((item, i) => {
                            if(item.id === id){
                                item.qty = valueQTY
                                return item
                            } else {
                            return item
                            }
                        })
                    localStorage.setItem('products', JSON.stringify(findDataLocal));
                    tableViews(findDataLocal ,datas.length)
                    
                } else {
                    localStorage.setItem('products', JSON.stringify([...datas,{id,name,image,harga,qty:valueQTY}]));
                    tableViews([...datas,{id,name,image,harga,qty:valueQTY}],datas.length + 1)
                }

            }else{
                localStorage.setItem('products', JSON.stringify([{id,name,image,harga,qty:valueQTY}]));
                tableViews([{id,name,image,harga,qty:valueQTY}],1)
            }
            if(type === "modal"){
              $('#productView').modal('hide')
            }
        }
    </script>
      <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
      <script src="{{asset('frontend/js/front.js')}}"></script>
  </body>
</html>