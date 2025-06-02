<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #d9a7c7, #fffcdc);
      color: #333;
      margin: 0;
      padding: 0;
    }

    h2 {
      font-weight: 700;
      color: #333;
    }

    .container {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      margin-top: 40px;
    }

    label {
      font-weight: 500;
    }

    input,
    textarea {
      border-radius: 10px;
    }

    .btn {
      border-radius: 10px;
      transition: all 0.3s ease-in-out;
    }

    .btn:hover {
      transform: scale(1.05);
    }

    .section-title {
      font-weight: 600;
      font-size: 18px;
      color: #333;
      margin-top: 24px;
      border-bottom: 2px solid #ccc;
    }

    #cv-template {
      display: none;
      padding: 40px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }

    .cv-header {
      border-bottom: 1px solid #aaa;
      padding-bottom: 12px;
      margin-bottom: 20px;
      text-align: center;
    }

    .cv-header h1 {
      font-size: 24px;
      font-weight: bold;
    }

    .cv-header p {
      margin: 2px 0;
      color: #555;
    }

    ul {
      padding-left: 20px;
    }

    ul li {
      margin-bottom: 6px;
    }

    @media print {
  * {
    visibility: hidden;
  }

  #cv-template, #cv-template * {
    visibility: visible;
  }

  #cv-template {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    box-shadow: none;
    page-break-inside: avoid;
  }

  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
  }

  .cv-header {
    border: none;
    padding: 0;
    margin: 0 0 12px 0;
  }

  .cv-header h1 {
    margin: 0;
    font-size: 20px;
  }

  .section {
    page-break-inside: avoid;
  }
}

  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center">Resume Generator</h2>
    <div class="row">
      <div class="col-md-6">
        <h5>Personal Details</h5>
        <label for="nameField">Full Name</label>
        <input type="text" id="nameField" class="form-control" placeholder="Full Name" />
        <label for="contactField" class="mt-2">Contact Number</label>
        <input type="text" id="contactField" class="form-control" placeholder="Contact Number" />
        <label for="emailField" class="mt-2">Email</label>
        <input type="email" id="emailField" class="form-control" placeholder="Email" />
        <label for="linkedField" class="mt-2">LinkedIn URL</label>
        <input type="text" id="linkedField" class="form-control" placeholder="LinkedIn URL" />
        <label for="fbField" class="mt-2">GitHub URL</label>
        <input type="text" id="fbField" class="form-control" placeholder="GitHub URL" />
        <label for="addressField" class="mt-2">Address</label>
        <textarea id="addressField" class="form-control" rows="2" placeholder="Address"></textarea>

          
      </div>

      <div class="col-md-6">
        
      <label>Secondary Education</label>
<textarea class="form-control eqfield mt-2" id="secondaryField" rows="2" placeholder="e.g., CBSE, 92%, XYZ School"></textarea>

<label class="mt-2">Senior Secondary Education</label>
<textarea class="form-control eqfield mt-2" id="seniorSecondaryField" rows="2" placeholder="e.g., CBSE, 85%, ABC School"></textarea>

<label class="mt-2">Graduation Type</label>
<select id="gradType" class="form-select mt-2">
  <option value="Graduation">Graduation</option>
  <option value="Diploma">Diploma</option>
  <option value="B.Tech">B.Tech</option>
  <option value="B.Sc">B.Sc</option>
  <option value="Other">Other</option>
</select>

<label class="mt-2">Graduation Details</label>
<textarea class="form-control mt-2" id="gradDetail" rows="2" placeholder="e.g., Graphic Era University, CGPA 8.5, CSE"></textarea>


        <h5 class="mt-4">Skills</h5>
        <div id="sF">
  <input class="form-control sFieldTitle mt-2" placeholder="Title">
  <textarea class="form-control sFieldDesc mt-1" rows="2" placeholder="Description"></textarea>
  <div class="text-center mt-2">
    <button onclick="addNewSfield()" class="btn btn-sm btn-primary">Add Skill</button>
  </div>
</div>


        <h5 class="mt-4">Projects</h5>
        <div id="proj">
  <input class="form-control projFieldTitle mt-2" placeholder="Title">
  <textarea class="form-control projFieldDesc mt-1" rows="2" placeholder="Description"></textarea>
  <div class="text-center mt-2">
    <button onclick="addNewProjField()" class="btn btn-sm btn-primary">Add Project</button>
  </div>
</div>


        <h5 class="mt-4">Certifications</h5>
        <div id="cert">
  <input class="form-control certFieldTitle mt-2" placeholder="Title">
  <textarea class="form-control certFieldDesc mt-1" rows="2" placeholder="Description"></textarea>
  <div class="text-center mt-2">
    <button onclick="addNewCertField()" class="btn btn-sm btn-primary">Add Certification</button>
  </div>
</div>

      </div>
    </div>

    <div class="text-center my-4">
      <button class="btn btn-success" onclick="generateCV()">Generate CV</button>
      <button class="btn btn-primary" onclick="window.print()">Print CV</button>
    </div>

    <div class="mt-5" id="cv-template">
      <div class="cv-header">
        <h1 id="nameT2">Pranav Tewari</h1>
        <p><span id="contactT"></span> ⋄ <span id="addressT"></span></p>
        <p><span id="emailT"></span> ⋄ <a href="#" id="linkedT">LinkedIn</a> ⋄ <a href="#" id="fbT">GitHub</a></p>
      </div>

      <div class="section">
        <div class="section-title">EDUCATION</div>
        <ul id="eqT"></ul>
      </div>

      <div class="section">
        <div class="section-title">PROJECTS</div>
        <ul id="projT"></ul>
      </div>

      <div class="section">
        <div class="section-title">SKILLS</div>
        <ul id="sT"></ul>
      </div>

      <div class="section">
        <div class="section-title">CERTIFICATIONS</div>
        <ul id="certT"></ul>
      </div>

      
      
  <script>
    function createRemovableFieldWithTitle(type, containerId) {
  const container = document.getElementById(containerId);
  const btn = container.querySelector("button");

  const wrapper = document.createElement("div");
  wrapper.className = "mt-3";

  const titleInput = document.createElement("input");
  titleInput.className = `${type}Title form-control mb-1`;
  titleInput.placeholder = "Title";

  const descTextarea = document.createElement("textarea");
  descTextarea.className = `${type}Desc form-control`;
  descTextarea.rows = 2;
  descTextarea.placeholder = "Description";

  const removeBtn = document.createElement("button");
  removeBtn.textContent = "Remove";
  removeBtn.type = "button";
  removeBtn.className = "btn btn-danger btn-sm mt-2";
  removeBtn.onclick = () => wrapper.remove();

  wrapper.appendChild(titleInput);
  wrapper.appendChild(descTextarea);
  wrapper.appendChild(removeBtn);

  container.insertBefore(wrapper, btn.parentElement);
}

function addNewSfield() {
  createRemovableFieldWithTitle("sField", "sF");
}

function addNewProjField() {
  createRemovableFieldWithTitle("projField", "proj");
}

function addNewCertField() {
  createRemovableFieldWithTitle("certField", "cert");
}


    function generateCV() {
  document.getElementById("nameT2").innerText = document.getElementById("nameField").value;
  document.getElementById("contactT").innerText = document.getElementById("contactField").value;
  document.getElementById("emailT").innerText = document.getElementById("emailField").value;
  document.getElementById("addressT").innerText = document.getElementById("addressField").value;
  document.getElementById("linkedT").innerText = document.getElementById("linkedField").value;
  document.getElementById("linkedT").href = document.getElementById("linkedField").value;
  document.getElementById("fbT").innerText = document.getElementById("fbField").value;
  document.getElementById("fbT").href = document.getElementById("fbField").value;

  const mapFieldsToListWithTitle = (titleClass, descClass, containerId) => {
    const titles = document.getElementsByClassName(titleClass);
    const descs = document.getElementsByClassName(descClass);
    let listHTML = "";

    for (let i = 0; i < titles.length; i++) {
      const title = titles[i].value.trim();
      const desc = descs[i].value.trim();

      if (title || desc) {
        listHTML += `<li><strong>${title}</strong><br>${desc}</li>`;
      }
    }
    document.getElementById(containerId).innerHTML = listHTML;
  };

  mapFieldsToListWithTitle("sFieldTitle", "sFieldDesc", "sT");
  mapFieldsToListWithTitle("projFieldTitle", "projFieldDesc", "projT");
  mapFieldsToListWithTitle("certFieldTitle", "certFieldDesc", "certT");

  // Education Section
  const secondary = document.getElementById("secondaryField").value.trim();
  const seniorSecondary = document.getElementById("seniorSecondaryField").value.trim();
  const gradType = document.getElementById("gradType").value;
  const gradDetail = document.getElementById("gradDetail").value.trim();

  let eqList = "";
  if (secondary) {
    eqList += `<li><strong>Secondary Education:</strong> ${secondary}</li>`;
  }
  if (seniorSecondary) {
    eqList += `<li><strong>Senior Secondary Education:</strong> ${seniorSecondary}</li>`;
  }
  if (gradDetail) {
    eqList += `<li><strong>${gradType}:</strong> ${gradDetail}</li>`;
  }
  document.getElementById("eqT").innerHTML = eqList;

  // Uploaded File Preview
  /* const fileInput = document.getElementById("fileField");
  const preview = document.getElementById("filePreview");
  preview.innerHTML = "";

  if (fileInput.files.length > 0) {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      const fileType = file.type;
      if (fileType.startsWith("image/")) {
        preview.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image" style="max-width: 150px; max-height: 150px;">`;
      } else if (fileType === "application/pdf") {
        preview.innerHTML = `<a href="${e.target.result}" target="_blank">View Uploaded PDF</a>`;
      } else {
        preview.innerText = "Unsupported file type.";
      }
    };

    reader.readAsDataURL(file);
  } */

  document.getElementById("cv-template").style.display = "block";
}

  </script>
</body>

</html>
