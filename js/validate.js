window.addEventListener(
  "DOMContentLoaded",

  () => {
    // 「送信」ボタンの要素を取得
    const submit = document.querySelector("#check-btn");

    // エラーメッセージと赤枠の削除
    function reset(input_infomation, error_message) {
      const input_info = document.querySelector(input_infomation);
      const err_message = document.querySelector(error_message);
      err_message.textContent = "";
      input_info.classList.remove("input-invalid");
      input_info.classList.remove("err");
      adderrorMessage(0);
    }

    // 「お名前」入力欄の空欄チェック関数
    function invalitName(input_target, error_target, error_message) {
      const name = document.querySelector(input_target);
      const errMsgName = document.querySelector(error_target);

      if (!name.value) {
        errMsgName.classList.add("form-invalid");
        errMsgName.textContent = error_message;
        name.focus();
        name.classList.add("input-invalid");
        name.classList.add("err");
        // 動作を止める
        return false;
      }
      // 動作を進める
      return true;
    }

    function validateKatakanaInput(inputSelector, errorMsgSelector) {
      const inputElement = document.querySelector(inputSelector);
      const errorMsgElement = document.querySelector(errorMsgSelector);

      if (inputElement.value !== "") {
        if (!validateKatakana(inputElement.value)) {
          errorMsgElement.textContent = "カタカナでご入力ください。";
          inputElement.focus();
          return false;
        } else {
          errorMsgElement.textContent = ""; // Clear error message if validation passes
        }
      }
      return true;
    }

    // 「送信」ボタンの要素にクリックイベントを設定する
    submit?.addEventListener(
      "click",
      (e) => {
        // デフォルトアクションをキャンセル
        e.preventDefault();
        var error = 0;
        reset("#input-choice", "#err-msg-input-choice");
        reset("#input-resident", "#err-msg-input-resident");
        reset("#input-owner", "#err-msg-input-owner");
        reset("#input-search", "#err-msg-input-search");
        reset("#name01-1", "#err-msg-input-name");
        reset("#name01-2", "#err-msg-input-name");
        reset("#name02-1", "#err-msg-input-kname");
        reset("#name02-2", "#err-msg-input-kname");
        reset("#email01", "#err-msg-input-mail");
        reset("#email02", "#err-msg-input-cmail");
        reset("#address01", "#err-msg-input-address");
        reset("#address02", "#err-msg-input-address");
        reset("#address03", "#err-msg-input-address03");
        reset("#tel01", "#err-msg-input-tel");
        reset("#tel02", "#err-msg-input-tel");
        reset("#tel03", "#err-msg-input-tel");

        const focus = () => document.querySelector("#input-family_name").focus();

        // 「お名前」入力欄の空欄チェック
        if (invalitName("#input-choice", "#err-msg-input-choice", "必須項目です。選択をお願いします。") === false) {
          error = 1;
        }
        checkChoice();

        if (invalitName("#input-resident", "#err-msg-input-resident", "必須項目です。選択をお願いします。") === false) {
          error = 1;
        }

        checkResident();

        if (invalitName("#input-owner", "#err-msg-input-owner", "必須項目です。選択をお願いします。") === false) {
          error = 1;
        }
        checkOwner();

        if (invalitName("#input-search", "#err-msg-input-search", "必須項目です。選択をお願いします。") === false) {
          error = 1;
        }
        checkSearch();

        if (invalitName("#name01-1", "#err-msg-input-name", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        }
        if (invalitName("#name01-2", "#err-msg-input-name", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        }
        if (invalitName("#name02-1", "#err-msg-input-kname", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const katakana_value = document.querySelector("#name02-1");
          const katakana_inputbox = document.querySelector("#name02-1");
          const katakana_errMsg = document.querySelector("#err-msg-input-kname");
          if (!validateKatakana(katakana_value.value)) {
            katakana_errMsg.classList.add("form-invalid");
            katakana_inputbox.classList.add("err");
            katakana_errMsg.textContent = "カタカナでご入力ください。";
            katakana_value.focus();
            katakana_value.classList.add("input-invalid");
            error = 1;
          }
        }
        if (invalitName("#name02-2", "#err-msg-input-kname", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const katakana_value = document.querySelector("#name02-2");
          const katakana_inputbox = document.querySelector("#name02-2");
          const katakana_errMsg = document.querySelector("#err-msg-input-kname");
          if (!validateKatakana(katakana_value.value)) {
            katakana_errMsg.classList.add("form-invalid");
            katakana_inputbox.classList.add("err");
            katakana_errMsg.textContent = "カタカナでご入力ください。";
            katakana_value.focus();
            katakana_value.classList.add("input-invalid");
            error = 1;
          }
        }

        // Validate the first input
        if (!validateKatakanaInput("#name04-1", "#err-msg-input-lkname")) {
          error = 1;
        }

        // Validate the second input
        if (!validateKatakanaInput("#name04-2", "#err-msg-input-lkname")) {
          error = 1;
        }

        if (invalitName("#email01", "#err-msg-input-mail", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const email = document.querySelector("#email01");
          const inputbox = document.querySelector("#email01");
          const c_email = document.querySelector("#email02");
          const errMsgEmail = document.querySelector("#err-msg-input-mail");
          const c_errMsgEmail = document.querySelector("#err-msg-input-cmail");

          if (!validateEmail(email.value)) {
            errMsgEmail.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgEmail.textContent = "半角英数文字でご記入ください。";
            email.focus();
            email.classList.add("input-invalid");
            error = 1;
            // if (!hasCapitalAndJapanese(email.value)) {
            //   errMsgEmail.classList.add("form-invalid");
            //   inputbox.classList.add("err");
            //   errMsgEmail.textContent = "半角英数文字でご記入ください。";
            //   email.focus();
            //   email.classList.add("input-invalid");
            //   error = 1;
            // }
          } else {
            if (email.value != c_email.value) {
              c_errMsgEmail.classList.add("form-invalid");
              c_errMsgEmail.textContent = "メールアドレスが一致しません。";
              c_email.focus();
              c_email.classList.add("input-invalid");
              error = 1;
            }
          }
        }
        if (invalitName("#email02", "#err-msg-input-cmail", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const email = document.querySelector("#email02");
          const inputbox = document.querySelector("#email02");
          const errMsgEmail = document.querySelector("#err-msg-input-cmail");
          if (!validateEmail(email.value)) {
            errMsgEmail.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgEmail.textContent = "半角英数文字でご記入ください。";
            email.focus();
            email.classList.add("input-invalid");
            error = 1;
            // if (!hasCapitalAndJapanese(email.value)) {
            //   errMsgEmail.classList.add("form-invalid");
            //   inputbox.classList.add("err");
            //   errMsgEmail.textContent = "半角英数文字でご記入ください。";
            //   email.focus();
            //   email.classList.add("input-invalid");
            //   error = 1;
            // }
          }
        }
        if (invalitName("#address01", "#err-msg-input-address", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const address01 = document.querySelector("#address01");
          const inputbox = document.querySelector("#address01");
          const errMsgaddress01 = document.querySelector("#err-msg-input-address");
          if (!isDigitOnly(address01.value)) {
            errMsgaddress01.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgaddress01.textContent = "半角数字でご記入ください。";
            address01.focus();
            address01.classList.add("input-invalid");
            error = 1;
          }
        }

        if (invalitName("#address02", "#err-msg-input-address", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const address02 = document.querySelector("#address02");
          const inputbox = document.querySelector("#address02");
          const errMsgaddress02 = document.querySelector("#err-msg-input-address");
          if (!isDigitOnly(address02.value)) {
            errMsgaddress02.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgaddress02.textContent = "半角数字でご記入ください。";
            address02.focus();
            address02.classList.add("input-invalid");
            error = 1;
          }
        }
        if (invalitName("#address03", "#err-msg-input-address03", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        }
        if (invalitName("#tel01", "#err-msg-input-tel", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const tel01 = document.querySelector("#tel01");
          const inputbox = document.querySelector("#tel01");
          const errMsgtel01 = document.querySelector("#err-msg-input-tel");
          if (!isDigitOnly(tel01.value)) {
            errMsgtel01.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgtel01.textContent = "半角数字でご記入ください。";
            tel01.focus();
            tel01.classList.add("input-invalid");
            error = 1;
          }
        }

        if (invalitName("#tel02", "#err-msg-input-tel", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const tel02 = document.querySelector("#tel02");
          const inputbox = document.querySelector("#tel02");
          const errMsgtel02 = document.querySelector("#err-msg-input-tel");
          if (!isDigitOnly(tel02.value)) {
            errMsgtel02.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgtel02.textContent = "半角数字でご記入ください。";
            tel02.focus();
            tel02.classList.add("input-invalid");
            error = 1;
          }
        }
        if (invalitName("#tel03", "#err-msg-input-tel", "必須項目です。ご記入をお願いします。") === false) {
          error = 1;
        } else {
          const tel03 = document.querySelector("#tel03");
          const inputbox = document.querySelector("#tel03");
          const errMsgtel03 = document.querySelector("#err-msg-input-tel");
          if (!isDigitOnly(tel03.value)) {
            errMsgtel03.classList.add("form-invalid");
            inputbox.classList.add("err");
            errMsgtel03.textContent = "半角数字でご記入ください。";
            tel03.focus();
            tel03.classList.add("input-invalid");
            error = 1;
          }
        }

        if (error == 1) {
          callanchor();
          adderrorMessage(1);
          return;
        } else {
          // document.inquiry_form.submit();
          const form = document.inquiry_form;
          if (form.reportValidity()) {
            form.submit();
          }
        }
      },
      false
    );
  },
  false
);

function hasCapitalAndJapanese(email) {
  const capitalRegex = /[A-Z]/;
  const japaneseRegex = /[\u3040-\u30FF\u3400-\u4DBF\u4E00-\u9FFF\uF900-\uFAFF]/; // Japanese Unicode ranges
  return capitalRegex.test(email) && japaneseRegex.test(email);
}

function callanchor() {
  $(".input-invalid").each(function () {
    $("html,body").animate({ scrollTop: $("form").offset().top - 250 }, 0);
  });
}

function adderrorMessage(flg) {
  if (flg == 1) {
    $(".flash_message").html("入力内容に誤りがあります。ご確認ください。");
  } else {
    $(".flash_message").html("");
  }
}

function validateEmail(email) {
  // const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const re = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
  return re.test(String(email).toLowerCase());
}

function validateKatakana(katakana_value) {
  const katakana_check = /^[\u30A0-\u30FF]+$/;
  return katakana_check.test(String(katakana_value));
}

function checkResident() {
  const residentButtons = document.querySelectorAll(".resident");
  let isAnyResidentButtonChecked = false;

  residentButtons.forEach((button) => {
    if (button.checked) {
      isAnyResidentButtonChecked = true;
      return;
    }
  });
  residentButtons.forEach((resident) => {
    resident.addEventListener("change", () => {
      $("#input-resident").val("価値");
    });
  });

  // if (isAnyResidentButtonChecked) {
  //   $("#err-msg-input-resident").css("display", "none");
  // } else {
  //   $("#err-msg-input-resident").css("display", "block");
  // }
}

function checkOwner() {
  const ownerButtons = document.querySelectorAll(".owner");
  let isAnyOwnerButtonChecked = false;

  ownerButtons.forEach((button) => {
    if (button.checked) {
      isAnyOwnerButtonChecked = true;
      return;
    }
  });
  ownerButtons.forEach((owner) => {
    owner.addEventListener("change", () => {
      $("#input-owner").val("価値");
    });
  });

  // if (isAnyOwnerButtonChecked) {
  //   $("#err-msg-input-owner").css("display", "none");
  // } else {
  //   $("#err-msg-input-owner").css("display", "block");
  // }
}

function checkChoice() {
  const radioButtons = document.querySelectorAll(".rbtn");
  let isAnyRadioButtonChecked = false;

  radioButtons.forEach((button) => {
    if (button.checked) {
      isAnyRadioButtonChecked = true;
      return;
    }
  });
  radioButtons.forEach((radio) => {
    radio.addEventListener("change", () => {
      $("#input-choice").val("価値");
    });
  });

  // if (isAnyRadioButtonChecked) {
  //   $("#err-msg-input-choice").css("display", "none");
  // } else {
  //   $("#err-msg-input-choice").css("display", "block");
  // }
}

function checkSearch() {
  const searchButtons = document.querySelectorAll(".search");
  let isAnySearchButtonChecked = false;

  searchButtons.forEach((button) => {
    if (button.checked) {
      isAnySearchButtonChecked = true;
      return;
    }
  });
  searchButtons.forEach((search) => {
    search.addEventListener("change", () => {
      $("#input-search").val("価値");
    });
  });

  // if (isAnySearchButtonChecked) {
  //   $("#err-msg-input-search").css("display", "none");
  // } else {
  //   $("#err-msg-input-search").css("display", "block");
  // }
}

function isDigitOnly(input) {
  const digitOnlyRegex = /^\d+$/;
  return digitOnlyRegex.test(input);
}

document.addEventListener("DOMContentLoaded", () => {
  $("#reset-btn").click(() => {
    $("#input-choice").val("");
    $("#input-resident").val("");
    $("#input-search").val("");
    $("#name01-1").val("");
    $("#name01-2").val("");
    $("#name02-1").val("");
    $("#name02-2").val("");
    $("#name03-1").val("");
    $("#name03-2").val("");
    $("#name04-1").val("");
    $("#name04-2").val("");
    $("#email01").val("");
    $("#email02").val("");
    $("#address01").val("");
    $("#address02").val("");
    $("#address03").val("");
    $("#tel01").val("");
    $("#tel02").val("");
    $("#tel03").val("");
    $("#message").val("");

    // Reset radio buttons to unchecked state
    $("input[name='choice']").prop("checked", false);
    $("input[name='resident[]']").prop("checked", false);
    $("input[name='owner[]']").prop("checked", false);
    $("input[name='search[]']").prop("checked", false);
    localStorage.removeItem("data");
    localStorage.clear();

    // Remove radio check remove
    $("#fieldset-resident").removeClass("hidden");
    $("#fieldset-owner").removeClass("hidden");
    $("#fieldset-search").removeClass("hidden");
  });

  (function checkChoiceValue() {
    const radioButtons = document.querySelectorAll(".rbtn");
    radioButtons.forEach((radio) => {
      radio.addEventListener("change", () => {
        $("#input-choice").val("価値");
      });
    });
  })();

  (function checkResidentValue() {
    const residentButtons = document.querySelectorAll(".resident");
    residentButtons.forEach((resident) => {
      resident.addEventListener("change", () => {
        $("#input-resident").val("価値");
      });
    });
  })();

  (function checkOwnerValue() {
    const ownerButtons = document.querySelectorAll(".owner");
    ownerButtons.forEach((owner) => {
      owner.addEventListener("change", () => {
        $("#input-owner").val("価値");
      });
    });
  })();

  (function checkSearchValue() {
    const searchButtons = document.querySelectorAll(".search");
    searchButtons.forEach((search) => {
      search.addEventListener("change", () => {
        $("#input-search").val("価値");
      });
    });
  })();

  (function radioValueCheck() {
    const choicebuttons = document.querySelectorAll(".rbtn");

    choicebuttons.forEach((choicebutton) => {
      choicebutton.addEventListener("change", (event) => {
        if (event.target.value == "入居者様からのお問い合わせ（あなたが入居中の場合）") {
          $("#fieldset-resident").removeClass("hidden");
          $("#fieldset-owner").addClass("hidden");
          $("#fieldset-search").addClass("hidden");
          $("#address").removeClass("hidden");

          $("#input-resident").val("");
          $("#input-owner").val("価値");
          $("#input-search").val("価値");

          $("#address01").val("");
          $("#address02").val("");
          $("#address03").val("");

          localStorage.setItem("rdo1", "rdo1");
          localStorage.removeItem("rdo2");
          localStorage.removeItem("rdo3");
          localStorage.removeItem("rdo4");
          $("input[name='owner[]']").prop("checked", false);
          $("input[name='search[]']").prop("checked", false);

          $("#lessor-text").removeClass("hidden");
          $("#lessor-name").removeClass("hidden");
        } else if (event.target.value == "物件オーナー様・賃貸経営に関するお問い合わせ") {
          $("#fieldset-resident").addClass("hidden");
          $("#fieldset-owner").removeClass("hidden");
          $("#fieldset-search").addClass("hidden");
          $("#address").addClass("hidden");

          $("#input-resident").val("価値");
          $("#input-search").val("価値");
          $("#input-owner").val("");

          $("#address01").val("1");
          $("#address02").val("2");
          $("#address03").val("価値");

          localStorage.setItem("rdo2", "rdo2");
          localStorage.removeItem("rdo1");
          localStorage.removeItem("rdo3");
          localStorage.removeItem("rdo4");
          $("input[name='resident[]']").prop("checked", false);
          $("input[name='search[]']").prop("checked", false);

          $("#lessor-text").addClass("hidden");
          $("#lessor-name").addClass("hidden");

          $("#name03-1").val("");
          $("#name03-2").val("");
          $("#name04-1").val("");
          $("#name04-2").val("");
        } else if (event.target.value == "賃貸のお部屋探しの方") {
          $("#fieldset-resident").addClass("hidden");
          $("#fieldset-owner").addClass("hidden");
          $("#fieldset-search").removeClass("hidden");
          $("#address").addClass("hidden");

          $("#input-resident").val("価値");
          $("#input-owner").val("価値");
          $("#input-search").val("");

          $("#address01").val("1");
          $("#address02").val("2");
          $("#address03").val("価値");

          localStorage.setItem("rdo3", "rdo3");
          localStorage.removeItem("rdo1");
          localStorage.removeItem("rdo2");
          localStorage.removeItem("rdo4");
          $("input[name='resident[]']").prop("checked", false);
          $("input[name='owner[]']").prop("checked", false);

          $("#lessor-text").addClass("hidden");
          $("#lessor-name").addClass("hidden");

          $("#name03-1").val("");
          $("#name03-2").val("");
          $("#name04-1").val("");
          $("#name04-2").val("");
        } else if (event.target.value == "一般の方") {
          $("#fieldset-resident").addClass("hidden");
          $("#fieldset-owner").addClass("hidden");
          $("#fieldset-search").addClass("hidden");
          $("#address").addClass("hidden");

          $("#input-resident").val("価値");
          $("#input-owner").val("価値");
          $("#input-search").val("価値");

          $("#address01").val("1");
          $("#address02").val("2");
          $("#address03").val("価値");

          localStorage.setItem("rdo4", "rdo4");
          localStorage.removeItem("rdo1");
          localStorage.removeItem("rdo2");
          localStorage.removeItem("rdo3");
          $("input[name='resident[]']").prop("checked", false);
          $("input[name='owner[]']").prop("checked", false);
          $("input[name='search[]']").prop("checked", false);

          $("#lessor-text").addClass("hidden");
          $("#lessor-name").addClass("hidden");

          $("#name03-1").val("");
          $("#name03-2").val("");
          $("#name04-1").val("");
          $("#name04-2").val("");
        } else if (event.target.value == "営業の方はこちら") {
          $("#fieldset-resident").addClass("hidden");
          $("#fieldset-owner").addClass("hidden");
          $("#fieldset-search").addClass("hidden");
          $("#address").addClass("hidden");

          $("#input-resident").val("価値");
          $("#input-owner").val("価値");
          $("#input-search").val("価値");

          $("#address01").val("1");
          $("#address02").val("2");
          $("#address03").val("価値");

          localStorage.setItem("rdo4", "rdo4");
          localStorage.removeItem("rdo1");
          localStorage.removeItem("rdo2");
          localStorage.removeItem("rdo3");
          $("input[name='resident[]']").prop("checked", false);
          $("input[name='owner[]']").prop("checked", false);
          $("input[name='search[]']").prop("checked", false);

          $("#lessor-text").addClass("hidden");
          $("#lessor-name").addClass("hidden");

          $("#name03-1").val("");
          $("#name03-2").val("");
          $("#name04-1").val("");
          $("#name04-2").val("");
        } else {
          $("#fieldset-resident").removeClass("hidden");
          $("#fieldset-owner").removeClass("hidden");
          $("#fieldset-search").removeClass("hidden");
        }
      });
    });
  })();

  const localstorageData = localStorage.getItem("data");
  if (localstorageData) {
    $("#input-choice").val("価値");
    $("#input-resident").val("価値");
    $("#input-owner").val("価値");
    $("#input-search").val("価値");
  } else {
    $("#input-choice").val("");
    $("#input-resident").val("");
    $("#input-owner").val("");
    $("#input-search").val("");
  }

  const rdo1Data = localStorage.getItem("rdo1");
  const rdo2Data = localStorage.getItem("rdo2");
  const rdo3Data = localStorage.getItem("rdo3");
  const rdo4Data = localStorage.getItem("rdo4");
  if (rdo1Data) {
    $("#fieldset-resident").removeClass("hidden");
    $("#fieldset-owner").addClass("hidden");
    $("#fieldset-search").addClass("hidden");

    $("#confirm-fieldset-resident").removeClass("hidden");
    $("#confirm-fieldset-owner").addClass("hidden");
    $("#confirm-fieldset-search").addClass("hidden");

    // $("#input-resident").val("");

    $("#lessor-text").removeClass("hidden");
    $("#lessor-name").removeClass("hidden");

    $("#address").removeClass("hidden");

    $("#address-confirm").removeClass("hidden");
  } else if (rdo2Data) {
    $("#fieldset-resident").addClass("hidden");
    $("#fieldset-owner").removeClass("hidden");
    $("#fieldset-search").addClass("hidden");

    $("#confirm-fieldset-resident").addClass("hidden");
    $("#confirm-fieldset-owner").removeClass("hidden");
    $("#confirm-fieldset-search").addClass("hidden");

    // $("#input-owner").val("");

    $("#lessor-text").addClass("hidden");
    $("#lessor-name").addClass("hidden");

    $("#name03-1").val("");
    $("#name03-2").val("");
    $("#name04-1").val("");
    $("#name04-2").val("");

    $("#address").addClass("hidden");
    $("#address01").val("1");
    $("#address02").val("2");
    $("#address03").val("価値");

    $("#address-confirm").addClass("hidden");
  } else if (rdo3Data) {
    $("#fieldset-resident").addClass("hidden");
    $("#fieldset-owner").addClass("hidden");
    $("#fieldset-search").removeClass("hidden");

    $("#confirm-fieldset-resident").addClass("hidden");
    $("#confirm-fieldset-owner").addClass("hidden");
    $("#confirm-fieldset-search").removeClass("hidden");
    // $("#input-search").val("");

    $("#lessor-text").addClass("hidden");
    $("#lessor-name").addClass("hidden");

    $("#name03-1").val("");
    $("#name03-2").val("");
    $("#name04-1").val("");
    $("#name04-2").val("");

    $("#address").addClass("hidden");
    $("#address01").val("1");
    $("#address02").val("2");
    $("#address03").val("価値");

    $("#address-confirm").addClass("hidden");
  } else if (rdo4Data) {
    $("#fieldset-resident").addClass("hidden");
    $("#fieldset-owner").addClass("hidden");
    $("#fieldset-search").addClass("hidden");

    $("#confirm-fieldset-resident").addClass("hidden");
    $("#confirm-fieldset-owner").addClass("hidden");
    $("#confirm-fieldset-search").addClass("hidden");

    $("#lessor-text").addClass("hidden");
    $("#lessor-name").addClass("hidden");

    $("#name03-1").val("");
    $("#name03-2").val("");
    $("#name04-1").val("");
    $("#name04-2").val("");

    $("#address").addClass("hidden");
    $("#address01").val("1");
    $("#address02").val("2");
    $("#address03").val("価値");

    $("#address-confirm").addClass("hidden");
  }
});
