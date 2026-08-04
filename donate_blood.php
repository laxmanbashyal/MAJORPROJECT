<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --main-red: #E30613;
      --dark-red: #BD0510;
      --hero-red: #D6000F;
      --main-dark: #0B1F3A;
      --secondary-dark: #172033;
      --muted-grey: #667085;
      --muted-grey-2: #61718A;
      --light-bg: #F8FAFC;
      --border-grey: #E5E7EB;
      --white: #FFFFFF;
      --green: #22C55E;
      --amber: #D97706;
      --blue: #0759FF;
      --purple: #9A16FF;
    }

    body {
      background: var(--light-bg);
      font-family: 'Inter', Arial, sans-serif;
      color: var(--secondary-dark);
    }

    .eligibility-wrapper {
      max-width: 1000px;
      margin: 50px auto 60px;
      padding: 20px;
    }

    .page-title {
      font-size: 2.1rem;
      font-weight: 700;
      margin: 0 0 24px;
      color: var(--main-dark);
    }

    .steps {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 0 auto 26px;
      gap: 18px;
      flex-wrap: wrap;
    }

    .step-item {
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--muted-grey-2);
      min-width: 140px;
      font-weight: 700;
    }

    .step-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--border-grey);
      color: var(--muted-grey-2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
    }

    .step-item.active .step-icon,
    .step-item.done .step-icon {
      background: var(--main-red);
      color: var(--white);
    }

    .step-item.active,
    .step-item.done {
      color: var(--main-red);
    }

    .step-connector {
      flex: 1;
      min-width: 80px;
      height: 3px;
      background: var(--border-grey);
      border-radius: 999px;
      margin: 0 0 0 8px;
    }

    .card-box {
      background: var(--white);
      border: 1px solid var(--border-grey);
      border-radius: 18px;
      padding: 30px 34px 26px;
      box-shadow: 0 8px 24px rgba(11, 31, 58, 0.06);
    }

    .step-title {
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 24px;
      color: var(--main-dark);
    }

    .field-label {
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--secondary-dark);
    }

    .form-control {
      height: 52px;
      border-radius: 12px;
      border: 1px solid var(--border-grey);
      font-size: 1rem;
      padding: 12px 14px;
      color: var(--secondary-dark);
      background: var(--white);
    }

    .form-control:focus {
      border-color: var(--main-red);
      box-shadow: 0 0 0 0.2rem rgba(227, 6, 19, 0.15);
    }

    .support-text {
      margin-top: 8px;
      color: var(--muted-grey);
      font-size: 0.95rem;
    }

    .gender-grid,
    .yes-no-groups {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .option-btn {
      border: 2px solid var(--border-grey);
      background: var(--white);
      color: var(--secondary-dark);
      padding: 12px 30px;
      border-radius: 10px;
      font-size: 1.05rem;
      font-weight: 700;
      cursor: pointer;
      min-width: 110px;
      transition: 0.2s ease;
    }

    .option-btn.active {
      border-color: var(--main-red);
      color: var(--main-red);
      box-shadow: inset 0 0 0 1px var(--main-red);
    }

    .step-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 32px;
      gap: 16px;
    }

    .btn-nav {
      border-radius: 12px;
      font-weight: 700;
      padding: 14px 28px;
      border: 1px solid var(--border-grey);
      background: var(--white);
      color: var(--secondary-dark);
      min-width: 150px;
    }

    .btn-primary-red {
      background: var(--main-red);
      border: none;
      color: var(--white);
      padding: 14px 24px;
      border-radius: 12px;
      font-weight: 800;
      min-width: 210px;
      box-shadow: 0 10px 20px rgba(227, 6, 19, 0.24);
    }

    .btn-primary-red:hover {
      background: var(--dark-red);
      color: var(--white);
    }

    .result-panel {
      text-align: center;
      padding: 24px 10px 10px;
    }

    .result-icon {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 18px;
      background: #fee2e2;
      color: var(--hero-red);
    }

    .result-title {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 18px;
      color: var(--main-dark);
    }

    .result-text {
      max-width: 780px;
      margin: 0 auto 20px;
      font-size: 1.1rem;
      color: var(--muted-grey);
    }

    .reason-box {
      background: rgba(217, 119, 6, 0.12);
      border-radius: 12px;
      padding: 20px 22px;
      text-align: left;
      margin: 20px auto 30px;
      max-width: 900px;
    }

    .reason-box ul {
      margin: 0;
      padding-left: 20px;
    }

    .reason-box li {
      margin: 8px 0;
      font-size: 1rem;
      color: var(--secondary-dark);
    }

    .hidden {
      display: none;
    }

    @media (max-width: 768px) {
      .steps {
        justify-content: center;
      }

      .step-item {
        width: 48%;
      }

      .step-connector {
        display: none;
      }

      .card-box {
        padding: 24px;
      }

      .result-title {
        font-size: 2.2rem;
      }
    }
  </style>
</head>

<body>
  <?php
  $active = 'donate';

  include('head.php');
  ?>

  <div class="eligibility-wrapper">
    <div class="page-title">Check if you're eligible to donate blood</div>

    <div class="steps" id="stepBar">
      <div class="step-item active" data-step="1">
        <div class="step-icon">??</div>
        <div>Personal<br>Info</div>
      </div>
      <div class="step-connector"></div>
      <div class="step-item" data-step="2">
        <div class="step-icon">?</div>
        <div>Health<br>Status</div>
      </div>
      <div class="step-connector"></div>
      <div class="step-item" data-step="3">
        <div class="step-icon">??</div>
        <div>Medical<br>History</div>
      </div>
      <div class="step-connector"></div>
      <div class="step-item" data-step="4">
        <div class="step-icon">?</div>
        <div>Result</div>
      </div>
    </div>

    <div class="card-box">
      <div id="step-1" class="step-panel">
        <div class="step-title">Personal Information</div>

        <div class="field-label">Age <span style="color:red">*</span></div>
        <input type="number" id="age" class="form-control" placeholder="Enter your age" min="18" max="65">
        <div id="ageError" class="support-text" style="color:#dc2626; display:none;">You are below 18 years old.</div>
        <div class="support-text">Must be between 18-65 years</div>

        <div class="field-label mt-4">Weight (kg) <span style="color:red">*</span></div>
        <input type="number" id="weight" class="form-control" placeholder="Enter your weight in kg" min="50">
        <div id="weightError" class="support-text" style="color:#dc2626; display:none;">You are below 50 kg.</div>
        <div class="support-text">Minimum 50 kg required</div>

        <div class="field-label mt-4">Gender <span style="color:red">*</span></div>
        <div class="gender-grid">
          <button type="button" class="option-btn" data-group="gender" data-value="Male">Male</button>
          <button type="button" class="option-btn" data-group="gender" data-value="Female">Female</button>
          <button type="button" class="option-btn" data-group="gender" data-value="Other">Other</button>
        </div>

        <div class="field-label mt-4">Last Donation Date (if any)</div>
        <input type="date" id="lastDonation" class="form-control">

        <div class="step-actions">
          <button type="button" class="btn-nav" disabled>� Previous</button>
          <button type="button" class="btn-primary-red" onclick="nextStep()">Next �</button>
        </div>
      </div>

      <div id="step-2" class="step-panel hidden">
        <div class="step-title">Current Health Status</div>

        <div class="field-label">Have you had any illness, cold, or flu in the last 14 days?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="illness" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="illness" data-value="No">No</button>
        </div>

        <div class="field-label mt-4">Are you currently taking any prescription medications?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="medication" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="medication" data-value="No">No</button>
        </div>

        <div class="field-label mt-4">Have you gotten a tattoo or piercing in the last 12 months?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="tattoo" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="tattoo" data-value="No">No</button>
        </div>

        <div class="field-label mt-4">Are you currently pregnant or have been pregnant in the last 6 months?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="pregnancy" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="pregnancy" data-value="No">No</button>
        </div>

        <div class="step-actions">
          <button type="button" class="btn-nav" onclick="prevStep()">� Previous</button>
          <button type="button" class="btn-primary-red" onclick="nextStep()">Next �</button>
        </div>
      </div>

      <div id="step-3" class="step-panel hidden">
        <div class="step-title">Medical History</div>

        <div class="field-label">Do you have any chronic diseases (diabetes, heart disease, cancer, etc.)?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="chronic" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="chronic" data-value="No">No</button>
        </div>

        <div class="field-label mt-4">Have you ever tested positive for HIV, Hepatitis B or C?</div>
        <div class="yes-no-groups">
          <button type="button" class="option-btn" data-group="infection" data-value="Yes">Yes</button>
          <button type="button" class="option-btn" data-group="infection" data-value="No">No</button>
        </div>

        <div class="alert alert-info mt-4 mb-0">
          All information provided is confidential and used solely to ensure donor and recipient safety. A medical
          professional will conduct a final assessment before donation.
        </div>

        <div class="step-actions">
          <button type="button" class="btn-nav" onclick="prevStep()">� Previous</button>
          <button type="button" class="btn-primary-red" onclick="showResult()">Check Eligibility �</button>
        </div>
      </div>

      <div id="step-4" class="step-panel hidden">
        <div class="result-panel">
          <div class="result-icon" id="resultIcon">!</div>
          <div class="result-title" id="resultTitle">Not Eligible at This Time</div>
          <div class="result-text" id="resultText">
            Based on your responses, you may not be eligible to donate blood right now. This could be temporary. Please
            consult a healthcare provider for more information.
          </div>
          <div class="reason-box">
            <ul id="reasonList">
              <li>Age outside 18-65 range</li>
              <li>Weight below 50 kg</li>
              <li>Recent illness or medication</li>
              <li>Recent tattoo or piercing</li>
              <li>Pregnancy</li>
            </ul>
          </div>
          <button type="button" class="btn-primary-red" id="resultActionBtn" onclick="restartFlow()">Retake Test</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let currentStep = 1;
    const stepData = {
      gender: '',
      illness: '',
      medication: '',
      tattoo: '',
      pregnancy: '',
      chronic: '',
      infection: ''
    };

    function setOption(group, value) {
      stepData[group] = value;
      document.querySelectorAll('[data-group="' + group + '"]').forEach(function (button) {
        button.classList.toggle('active', button.dataset.value === value);
      });
    }

    document.querySelectorAll('.option-btn').forEach(function (button) {
      button.addEventListener('click', function () {
        setOption(button.dataset.group, button.dataset.value);
      });
    });

    function validateStepOne() {
      const ageInput = document.getElementById('age');
      const weightInput = document.getElementById('weight');
      const age = Number(ageInput.value);
      const weight = Number(weightInput.value);
      const ageError = document.getElementById('ageError');
      const weightError = document.getElementById('weightError');

      let isValid = true;

      if (ageInput.value !== '') {
        if (age < 18) {
          ageError.style.display = 'block';
          ageError.textContent = 'You are below 18 years old.';
          isValid = false;
        } else if (age > 65) {
          ageError.style.display = 'block';
          ageError.textContent = 'You are above 65 years old.';
          isValid = false;
        } else {
          ageError.style.display = 'none';
        }
      } else {
        ageError.style.display = 'none';
      }

      if (weightInput.value !== '') {
        if (weight < 50) {
          weightError.style.display = 'block';
          weightError.textContent = 'You are below 50 kg.';
          isValid = false;
        } else {
          weightError.style.display = 'none';
        }
      } else {
        weightError.style.display = 'none';
      }

      return isValid;
    }

    document.getElementById('age').addEventListener('input', validateStepOne);
    document.getElementById('weight').addEventListener('input', validateStepOne);

    function nextStep() {
      if (currentStep === 1) {
        const age = Number(document.getElementById('age').value);
        const weight = Number(document.getElementById('weight').value);
        const genderSelected = stepData.gender;

        if (!age || !weight || !genderSelected) {
          alert('Please complete age, weight and gender before continuing.');
          return;
        }

        if (!validateStepOne()) {
          alert('Please enter a valid age and weight before continuing.');
          return;
        }
      }

      if (currentStep < 4) {
        currentStep += 1;
        updateSteps();
      }
    }

    function prevStep() {
      if (currentStep > 1) {
        currentStep -= 1;
        updateSteps();
      }
    }

    function updateSteps() {
      document.querySelectorAll('.step-panel').forEach(function (panel, index) {
        panel.classList.toggle('hidden', index + 1 !== currentStep);
      });

      document.querySelectorAll('.step-item').forEach(function (item) {
        const stepNumber = Number(item.dataset.step);
        item.classList.remove('active', 'done');
        if (stepNumber < currentStep) item.classList.add('done');
        if (stepNumber === currentStep) item.classList.add('active');
      });
    }

    function hasActiveOption(group) {
      return document.querySelector('[data-group="' + group + '"].active') !== null;
    }

    function showResult() {
      const age = Number(document.getElementById('age').value);
      const weight = Number(document.getElementById('weight').value);
      const lastDonationDate = document.getElementById('lastDonation').value;
      const reasons = [];

      const requiredGroups = ['gender', 'illness', 'medication', 'tattoo', 'pregnancy', 'chronic', 'infection'];
      const missingGroup = requiredGroups.find(function (group) {
        return !hasActiveOption(group);
      });

      if (missingGroup) {
        alert('Please answer every question on the form before checking your eligibility.');
        return;
      }

      if (age < 18 || age > 65) reasons.push('Age must be between 18 and 65 years.');
      if (weight < 50) reasons.push('Weight must be at least 50 kg.');
      if (lastDonationDate) {
        const lastDonation = new Date(lastDonationDate + 'T00:00:00');
        const today = new Date();
        const diffInDays = Math.floor((today - lastDonation) / (1000 * 60 * 60 * 24));

        if (diffInDays < 120) {
          reasons.push('Your last donation was less than 4 months ago.');
        }
      }
      if (stepData.illness === 'Yes') reasons.push('You had an illness, cold, or flu in the last 14 days.');
      if (stepData.medication === 'Yes') reasons.push('You are currently taking prescription medication.');
      if (stepData.tattoo === 'Yes') reasons.push('You had a tattoo or piercing in the last 12 months.');
      if (stepData.pregnancy === 'Yes') reasons.push('You are pregnant or were pregnant in the last 6 months.');
      if (stepData.chronic === 'Yes') reasons.push('You have a chronic disease such as diabetes, heart disease, or cancer.');
      if (stepData.infection === 'Yes') reasons.push('You tested positive for HIV, Hepatitis B, or Hepatitis C.');

      currentStep = 4;
      updateSteps();

      const resultTitle = document.getElementById('resultTitle');
      const resultText = document.getElementById('resultText');
      const resultIcon = document.getElementById('resultIcon');
      const reasonList = document.getElementById('reasonList');
      const resultActionBtn = document.getElementById('resultActionBtn');

      if (reasons.length === 0) {
        resultTitle.textContent = 'Eligible to Donate';
        resultText.textContent = 'Based on your answers, you appear eligible to donate blood. Please follow the next instructions from the donation center team.';
        resultIcon.textContent = '✓';
        resultIcon.style.background = '#dcfce7';
        resultIcon.style.color = '#16a34a';
        reasonList.innerHTML = '<li>You are within the required age range.</li><li>Your weight meets the minimum requirement.</li><li>Your current health history does not show any immediate restrictions.</li>';
        resultActionBtn.textContent = 'Donate Blood';
        resultActionBtn.setAttribute('onclick', "window.location.href='why_donate_blood.php'");
      } else {
        resultTitle.textContent = 'Not Eligible at This Time';
        resultText.textContent = 'Based on your responses, you may not be eligible to donate blood right now. This could be temporary. Please consult a healthcare provider for more information.';
        resultIcon.textContent = '!';
        resultIcon.style.background = '#fee2e2';
        resultIcon.style.color = '#dc2626';
        reasonList.innerHTML = reasons.map(function (reason) {
          return '<li>' + reason + '</li>';
        }).join('');
        resultActionBtn.textContent = 'Retake Test';
        resultActionBtn.setAttribute('onclick', 'restartFlow()');
      }
    }

    function restartFlow() {
      currentStep = 1;
      Object.keys(stepData).forEach(function (key) { stepData[key] = ''; });
      document.querySelectorAll('.option-btn').forEach(function (button) { button.classList.remove('active'); });
      document.getElementById('age').value = '';
      document.getElementById('weight').value = '';
      document.getElementById('lastDonation').value = '';
      updateSteps();
    }

    updateSteps();
  </script>

</body>

</html>