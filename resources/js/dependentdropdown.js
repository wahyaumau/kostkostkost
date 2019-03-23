function getRegencies(){
    $('select[name="province_id"]').on('change', function(){
        var provinceId = $(this).val();
        if(provinceId) {
            $.ajax({
                url: '/address/getRegencies/'+provinceId,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="regency_id"]').empty();
                    $('select[name="district_id"]').empty();
                    $('select[name="village_id"]').empty();

                    $('select[name="regency_id"]').append('<option value="">Pilih Kota</option>');

                    $.each(data, function(key, value){

                        $('select[name="regency_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        } else {
            $('select[name="regency_id"]').empty();
            $('select[name="district_id"]').empty();
            $('select[name="village_id"]').empty();
        }
    });    
}


function getDistricts(){
    $('select[name="regency_id"]').on('change', function(){
            var regencyId = $(this).val();
            if(regencyId) {
                $.ajax({
                    url: '/address/getDistricts/'+regencyId,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {


                        $('select[name="district_id"]').empty();                    
                        $('select[name="village_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Pilih Kecamatan</option>');

                        $.each(data, function(key, value){

                            $('select[name="district_id"]').append('<option value="'+ key +'">' + value + '</option>');

                        });
                    }
                });
            } else {            
                $('select[name="district_id"]').empty();
                $('select[name="village_id"]').empty();
            }

        });    
}

function getVillages(){
    $('select[name="district_id"]').on('change', function(){
            var districtId = $(this).val();
            if(districtId) {
                $.ajax({
                    url: '/address/getVillages/'+districtId,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {

                        $('select[name="village_id"]').empty();
                        $('select[name="village_id"]').append('<option value="">Pilih Desa</option>');


                        $.each(data, function(key, value){
                            $('select[name="village_id"]').append('<option value="'+ key +'">' + value + '</option>');                        
                        });
                    }
                });
            } else {                        
                $('select[name="village_id"]').empty();
            }

        });    
}

