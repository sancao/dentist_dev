
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'benh-nhan'}"
             class="btn btn-warning">
            <span class="glyphicon glyphicon-arrow-left"></span> Quay lại
            </router-link>
        </div>

        <div>
            <form @submit.prevent="saveForm()">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Họ tên</span>
                            <input type="text" placeholder="Nhập họ tên khách hàng" class="form-control"
                            v-model="benhnhan.name"
                            v-on:input="$v.benhnhan.name.$touch"
                            v-bind:class="{'error': $v.benhnhan.name.$error, 
                            'valid': $v.benhnhan.name.$dirty && !$v.benhnhan.name.$invalid}">
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Ngày sinh</span>
                            <date-picker name="date"
                            v-model="benhnhan.dob" 
                            v-on:input="$v.benhnhan.dob.$touch"
                            v-bind:class="{'error': $v.benhnhan.dob.$error, 
                            'valid': $v.benhnhan.dob.$dirty && !$v.benhnhan.dob.$invalid}"
                            :config="config"></date-picker>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Giới tính</span>
                                <select id="inputState" placeholder="Chọn giới tính"
                                 class="form-control" v-model="benhnhan.gender"
                                 v-on:input="$v.benhnhan.gender.$touch"
                                v-bind:class="{'error': $v.benhnhan.gender.$error, 
                                'valid': $v.benhnhan.gender.$dirty && !$v.benhnhan.gender.$invalid}">
                                    <option selected>Giới tính...</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Địa chỉ</span>
                            <textarea type="text" placeholder="Nhập địa chỉ khách hàng" class="form-control"
                                v-model="benhnhan.address"
                                v-on:input="$v.benhnhan.address.$touch"
                                v-bind:class="{error: $v.benhnhan.address.$error,
                                valid: $v.benhnhan.address.$dirty && !$v.benhnhan.address.$invalid}">
                            </textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Yêu cầu</span>
                            <textarea type="text" 
                            placeholder="Nhập yêu cầu..." 
                            class="form-control"
                                v-model="benhnhan.yeu_cau"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Chuẩn bệnh</span>
                            <textarea type="text" 
                            placeholder="Nhập bệnh lý...." 
                            class="form-control"
                                v-model="benhnhan.chuan_benh"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Tiền sử bệnh</span>
                                <select id="inputState"
                                 class="form-control">
                                    <option selected>Chọn tiền sử bênh (nếu có)...</option>
                                    <option value="Tim mạch">Tim mạch</option>
                                    <option value="Có thai">Có thai</option>
                                    <option value="Máu không đông">Máu không đông</option>
                                    <option value="Phản ứng thuốc">Phản ứng thuốc</option>
                                    <option value="Tiểu đường">Tiểu đường</option>
                                    <option value="Huyết áp">Huyết áp</option>
                                </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Điều trị</span>
                            <textarea type="text" 
                            placeholder="Nhập thông tin điều trị...." 
                            class="form-control"
                                v-model="benhnhan.dieu_tri"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Ký hiệu răng</span>
                            <textarea type="text" 
                            placeholder="Nhập ký hiệu răng...." 
                            class="form-control"
                                v-model="benhnhan.ky_hieu_rang"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Ngày hẹn</span>
                            <date-picker name="date" v-model="benhnhan.birthday" 
                            :config="config"></date-picker>
                        </div>
                    </div>

                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Điện thoại</span>
                            <input type="text" placeholder="Nhập số điện thoại..." class="form-control"
                            v-model="benhnhan.phone">
                        </div>
                    </div>
                    <div class="col-md-5 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                                <input type="text" placeholder="Nhập email (nếu có)..." class="form-control"
                            v-model="benhnhan.email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Tổng tiền</span>
                                <input type="text" placeholder="Nhập tổng tiền..." class="form-control"
                            v-model="benhnhan.tong_tien">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <button class="btn btn-success" :disabled="$v.benhnhan.$error">
                            <span class="glyphicon glyphicon-save"></span> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    // Import this component
    import datePicker from 'vue-bootstrap-datetimepicker';
  
    // Import date picker css
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
    import { required, minLength,maxLength,email,url } from 'vuelidate/lib/validators';

    export default {
        components: {
            datePicker
        },
        data: function () {
            return{
                benhnhan: {
                    name: '',
                    gender:'',
                    dob:'',
                    address: '',
                    yeu_cau: '',
                    email:'',
                    chuan_benh:'',
                    dieu_tri:'',
                    ky_hieu_rang:'',
                    tong_tien:'',
                    ngay_hen:'',
                    phone:''
                },
                config: {
                    format: 'DD-MM-YYYY',
                    useCurrent: false,
                }    
            }
        },
        validations: {
            benhnhan: {
                name: {
                    required,
                    minLength: minLength(5),
                    maxLength:maxLength(200)
                },
                gender: {
                    required
                },
                dob: {
                    required
                },
                phone: {
                    required,
                    minLength: minLength(10),
                    maxLength:maxLength(20)
                },
                address: {
                    required,
                    minLength: minLength(5),
                    maxLength:maxLength(200)
                }
            }
        },
        methods: {
            saveForm() {
                this.$v.benhnhan.$touch();
                if (!this.$v.$invalid) {
                    var app = this;
                    var newBenhnhan = app.benhnhan;
                    axios.post('/add-benhnhan', newBenhnhan)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Không thể tạo mới");
                    });    
                }
            }
        }
    }
</script>
