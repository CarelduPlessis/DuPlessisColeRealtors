            var warningTimeout;
            var warningBox = document.createElement("div");
            warningBox.className = "warning";

            function displayWarning(msg, el) {
                warningBox.innerHTML = msg;

                if (document.body.contains(warningBox)) {
                        window.clearTimeout(warningTimeout);
                    } else {
                        // insert warningBox after myTextbox
                        el.parentNode.insertBefore(warningBox, el.nextSibling);
                }

              warningTimeout = window.setTimeout(function() {
                  warningBox.parentNode.removeChild(warningBox);
                  warningTimeout = -1;
                }, 3000);
            }