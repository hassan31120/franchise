<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل البلاد</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">الصورة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>مصر</td>
            <td>
              <img
                src="https://mediaaws.almasryalyoum.com/news/verylarge/2018/10/02/848933_0.jpg"
                width="100"
                height="66.72"
                alt=""
              />
            </td>
            <td style="position: relative; text-align: center">
              <i class="fe fe-edit fe-16"></i>
              <i class="fe fe-trash fe-16" style="position: absolute; right: 5px"></i>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>السعودية</td>
            <td>
              <img
                src="https://cdn.sotor.com/thumbs/fit630x300/52008/1596976198/%D8%B9%D9%84%D9%85_%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D8%A9:_%D8%A3%D9%84%D9%88%D8%A7%D9%86%D9%87_%D9%88%D9%85%D8%B9%D8%A7%D9%86%D9%8A%D9%87%D8%A7%D8%8C_%D9%88%D8%B3%D8%A8%D8%A8_%D8%A7%D8%AE%D8%AA%D9%8A%D8%A7%D8%B1_%D9%87%D8%B0%D8%A7_%D8%A7%D9%84%D8%B4%D9%83%D9%84_%D9%84%D9%87.jpeg"
                width="100"
                height="66.72"
                alt=""
              />
            </td>
            <td style="position: relative; text-align: center">
              <i class="fe fe-edit fe-16"></i>
              <i class="fe fe-trash fe-16" style="position: absolute; right: 5px"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>
export default {
  name: "countries",
  data() {
    return {};
  },
};
</script>

<style></style>
