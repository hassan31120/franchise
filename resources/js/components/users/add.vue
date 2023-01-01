<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إضافة عضو جديد</h2>

      <form>
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة عضو جديد</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">الإسم</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">الإيميل</label>
                  <input
                    type="email"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="example-password">الرقم السري</label>
                  <input
                    type="password"
                    id="example-password"
                    class="form-control"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="example-palaceholder">تأكيد الرقم السري</label>
                  <input
                    type="password"
                    id="example-palaceholder"
                    class="form-control"
                  />
                </div>
              <button type="submit" class="btn" style="background-color: #ff7c00; color: aliceblue; width: 100px; font-weight: 600;">تأكيد</button>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <img src="@/assets/signup.gif" alt="" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  name: "add_user",
  data() {
    return {};
  },
};
</script>

<style></style>
