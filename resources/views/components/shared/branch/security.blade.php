<div class="card">
    <h4 class="card-header">تغير كلمة السر </h4>
    <div class="card-body">
        <form id="formChangePassword" method="POST" onsubmit="return false" novalidate="novalidate">
            <div class="alert alert-warning mb-2" role="alert">
                <h6 class="alert-heading">تأكد من حفظ كلمة المرور وعدم مشاركتها </h6>
                <div class="alert-body fw-normal">تأكد من ادخال رمز متكون من 4 خانات علي الاقل </div>
            </div>

            <div class="row">
                <div class="mb-2 col-md-6 form-password-toggle">
                    <label class="form-label" for="newPassword">كلمة السر الجديدة</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="············">
                        <span class="input-group-text cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </span>
                    </div>
                </div>

                <div class="mb-2 col-md-6 form-password-toggle">
                    <label class="form-label" for="confirmPassword">تأكيد كلمة المرور</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                        <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 waves-effect waves-float waves-light">تغير كلمة السر </button>
                </div>
            </div>
        </form>
    </div>
</div>