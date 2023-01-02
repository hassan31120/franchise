<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إضافة فرصة جديدة</h2>

      <form>
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة فرصة جديدة</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">العنوان</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="desc">الوصف</label>
                  <textarea
                    name="desc"
                    id="desc"
                    cols="30"
                    rows="5"
                    class="form-control"
                  ></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">اللوجو</label>
                  <input
                    type="file"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">عدد الفروع</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">منافذ الامتياز</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- <img src="@/assets/UsabilityTesting.gif" alt="" /> -->
                <div class="form-group mb-3">
                  <label for="simpleinput">معلومات مانح الإمتياز</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الرقم</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الإيميل</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">اللينك</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">المسؤول عن المتقدمين</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">السعر</label>
                  <input type="text" id="simpleinput" class="form-control" />
                </div>
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
                تأكيد
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  name: "add_chance",
  data() {
    return {};
  },
};
</script>

<style></style>
