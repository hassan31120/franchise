<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إرسال إشعار جديد</h2>

      <form>
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إرسال إشعار جديد</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">العنوان</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الوصف</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">الصورة</label>
                  <input
                    type="file"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                  />
                </div>
                <button
                  type="submit"
                  class="btn"
                  style="
                    background-color: #ff7c00;
                    color: aliceblue;
                    width: 100px;
                    font-weight: 600;
                  "
                >
                  إرسال
                </button>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <img src="@/assets/Pushnotifications.gif" alt="" />
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
  name: "noti",
  data() {
    return {};
  },
};
</script>

<style></style>
