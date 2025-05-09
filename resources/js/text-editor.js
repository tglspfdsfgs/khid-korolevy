import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Highlight from "@tiptap/extension-highlight";
import Underline from "@tiptap/extension-underline";
import Link from "@tiptap/extension-link";
import TextAlign from "@tiptap/extension-text-align";
import Image from "@tiptap/extension-image";
import YouTube from "@tiptap/extension-youtube";
import TextStyle from "@tiptap/extension-text-style";
import FontFamily from "@tiptap/extension-font-family";
import { Color } from "@tiptap/extension-color";
import Bold from "@tiptap/extension-bold";
import Table from "@tiptap/extension-table";
import TableCell from "@tiptap/extension-table-cell";
import TableHeader from "@tiptap/extension-table-header";
import TableRow from "@tiptap/extension-table-row";

const LoremIpsum = `<h2 style="text-align: center">Шахи: Мистецтво Стратегії</h2><blockquote><p><span style="font-size: 16px">Шахи — це боротьба двох умів, де кожен хід — це крок до перемоги або поразки.</span></p></blockquote><h3 style="text-align: center">Основи дебюту</h3><p><span style="font-size: 16px">У шахах </span><span><span style="font-weight: bold;">дебют</span></span><span style="font-size: 16px"> — це перші ходи, які закладають фундамент для подальшої гри.<br>Найпоширеніший дебют — <em>іспанська партія</em>, що починається ходами:</span></p><p><code>1. e4 e5 2. Nf3 Nc6 3. Bb5</code></p><h3 style="text-align: center">Популярні дебюти</h3><ol><li><p><span style="font-size: 16px">Італійська партія</span></p></li><li><p><span style="font-size: 16px">Сицилійський захист</span></p></li><li><p><span style="font-size: 16px">Французький захист</span></p></li><li><p><span style="font-size: 16px">Скандинавський захист</span></p></li><li><p><span style="font-size: 16px">Каро-Канн</span></p></li></ol><h3><span style="font-size: 16px">Таблиця: Ходи та стиль</span></h3><div class="tableWrapper"><table style="min-width: 50px;"><colgroup><col style="min-width: 25px;"><col style="min-width: 25px;"></colgroup><tbody><tr><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Дебют</span></p></th><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Стиль гри</span></p></th></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Італійська партія</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px"><em>Атакувальний</em></span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Каро-Канн</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Оборонний</span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Сицилійський захист</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Гнучкий</span></p></td></tr></tbody></table></div><hr contenteditable="false"><h3><span style="font-size: 14px">Корисні ресурси</span></h3><ul><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://chess.com"><span style="font-size: 12px">chess.com</span></a></p></li><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://lichess.org"><span style="font-size: 12px">lichess.org</span></a></p></li></ul>`;

window.addEventListener("load", function () {
    if (document.getElementById("wysiwyg")) {
        const FontSizeTextStyle = TextStyle.extend({
            addAttributes() {
                return {
                    fontSize: {
                        default: null,
                        parseHTML: (element) => element.style.fontSize,
                        renderHTML: (attributes) => {
                            if (!attributes.fontSize) {
                                return {};
                            }
                            return { style: "font-size: " + attributes.fontSize };
                        },
                    },
                };
            },
        });
        const CustomBold = Bold.extend({
            // Override the renderHTML method
            renderHTML({ mark, HTMLAttributes }) {
                const { style, ...rest } = HTMLAttributes;

                // Merge existing styles with font-weight
                const newStyle = "font-weight: bold;" + (style ? " " + style : "");

                return ["span", { ...rest, style: newStyle.trim() }, 0];
            },
            // Ensure it doesn't exclude other marks
            addOptions() {
                return {
                    ...this.parent?.(),
                    HTMLAttributes: {},
                };
            },
        });
        const CustomImage = Image.extend({
            addAttributes() {
                return {
                    ...this.parent?.(),
                    // Allow `class` attribute
                    class: {
                        default: null,
                        parseHTML: (element) => element.getAttribute("class"),
                        renderHTML: (attributes) => ({
                            class: attributes.class, // Передаём класс в рендер
                        }),
                    },
                };
            },
        });
        const TipTapExtensionTableCell = TableCell.extend({
            addAttributes() {
                return {
                    ...this.parent?.(),
                    backgroundColor: {
                        default: null,
                        renderHTML: (attributes) => {
                            if (!attributes.backgroundColor) {
                                return {};
                            }

                            return {
                                style: "background-color: " + attributes.backgroundColor,
                            };
                        },
                        parseHTML: (element) => {
                            return element.style.backgroundColor.replace(/['"]+/g, "");
                        },
                    },
                };
            },
        });

        // tip tap editor setup
        const editor = new Editor({
            element: document.querySelector("#wysiwyg"),
            extensions: [
                StarterKit.configure({
                    textStyle: false,
                    bold: false,
                    marks: {
                        bold: false,
                    },
                }),
                CustomBold,
                TextStyle,
                Color,
                FontSizeTextStyle,
                FontFamily,
                Highlight,
                Underline,
                Link.configure({
                    openOnClick: false,
                    autolink: true,
                    defaultProtocol: "https",
                    isAllowedUri: (url, ctx) => !url.startsWith("./") || ctx.defaultValidate(url),
                    HTMLAttributes: {
                        class: "link link-info",
                    },
                }),
                TextAlign.configure({
                    types: ["heading", "paragraph"],
                }),
                CustomImage,
                YouTube,
                Table.configure({
                    resizable: true,
                }),
                TableRow,
                TableHeader,
                TableCell,
                TipTapExtensionTableCell,
            ],
            content: LoremIpsum,
            editorProps: {
                attributes: {
                    class: "format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none",
                },
            },
        });

        // set up custom event listeners for the buttons
        document
            .getElementById("toggleBoldButton")
            .addEventListener("click", () => editor.chain().focus().toggleBold().run());
        document
            .getElementById("toggleItalicButton")
            .addEventListener("click", () => editor.chain().focus().toggleItalic().run());
        document
            .getElementById("toggleUnderlineButton")
            .addEventListener("click", () => editor.chain().focus().toggleUnderline().run());
        document
            .getElementById("toggleStrikeButton")
            .addEventListener("click", () => editor.chain().focus().toggleStrike().run());
        document.getElementById("toggleHighlightButton").addEventListener("click", () => {
            const isHighlighted = editor.isActive("highlight");
            // when using toggleHighlight(), judge if is is already highlighted.
            editor
                .chain()
                .focus()
                .toggleHighlight({
                    color: isHighlighted ? undefined : "#ffc078", // if is already highlighted，unset the highlight color
                })
                .run();
        });

        document.getElementById("toggleLinkButton").addEventListener("click", () => {
            const url = window.prompt("Вставити посилання:", "https://example.com/");
            editor.chain().focus().toggleLink({ href: url }).run();
        });
        document.getElementById("removeLinkButton").addEventListener("click", () => {
            editor.chain().focus().unsetLink().run();
        });
        document.getElementById("toggleCodeButton").addEventListener("click", () => {
            editor.chain().focus().toggleCode().run();
        });
        document.getElementById("toggleLeftAlignButton").addEventListener("click", () => {
            editor.chain().focus().setTextAlign("left").run();
        });
        document.getElementById("toggleCenterAlignButton").addEventListener("click", () => {
            editor.chain().focus().setTextAlign("center").run();
        });
        document.getElementById("toggleRightAlignButton").addEventListener("click", () => {
            editor.chain().focus().setTextAlign("right").run();
        });
        document.getElementById("toggleJustifyButton").addEventListener("click", () => {
            editor.chain().focus().setTextAlign("justify").run();
        });
        document.getElementById("toggleListButton").addEventListener("click", () => {
            editor.chain().focus().toggleBulletList().run();
        });
        document.getElementById("toggleOrderedListButton").addEventListener("click", () => {
            editor.chain().focus().toggleOrderedList().run();
        });
        document.getElementById("toggleBlockquoteButton").addEventListener("click", () => {
            editor.chain().focus().toggleBlockquote().run();
        });
        document.getElementById("toggleHRButton").addEventListener("click", () => {
            editor.chain().focus().setHorizontalRule().run();
        });

        //add image:
        const advancedImageModal = FlowbiteInstances.getInstance("Modal", "advanced-image-modal");
        document.getElementById("advancedImageForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const imageUrl = document.getElementById("IMAGE-URL").value;
            const size = document.getElementById("rel-sizes-input").value;
            const imagePlacement = document.querySelector('input[name="img-placement"]:checked').id;

            let className = `!my-0 w-full h-auto md:w-[${size}%]`;

            switch (imagePlacement) {
                case "img-left": {
                    className += " md:mr-auto";
                    break;
                }
                case "img-right": {
                    className += " md:ml-auto";
                    break;
                }
                case "img-center": {
                    className += " md:mx-auto";
                    break;
                }
                case "img-left-float": {
                    className += " md:float-left md:mr-6";
                    break;
                }
                case "img-right-float": {
                    className += " md:float-right md:ml-6";
                    break;
                }
            }

            if (imageUrl) {
                editor
                    .chain()
                    .focus()
                    .setImage({
                        src: imageUrl,
                        class: className,
                    })
                    .run();

                document.getElementById("advancedImageForm").reset();
                advancedImageModal.hide();
            }
        });

        //undo
        document.getElementById("toggleUndoButton").addEventListener("click", () => {
            editor.chain().focus().undo().run();
        });
        //redo
        document.getElementById("toggleRedoButton").addEventListener("click", () => {
            editor.chain().focus().redo().run();
        });

        const sourceCodeWrapper = document.getElementById("sourceCode");
        document.getElementById("toggleHTMLButton").addEventListener("click", () => {
            // basically just use editor.getHTML(); to get the raw html

            sourceCodeWrapper.innerHTML = editor
                .getHTML()
                .replace(/&/g, "&amp;") // Escape & character
                .replace(/</g, "&lt;") // Escape < character
                .replace(/>/g, "&gt;") // Escape > character
                .replace(/"/g, "&quot;") // Escape " character
                .replace(/'/g, "&#039;"); // Escape ' character
        });

        document.getElementById("addVideoButton").addEventListener("click", () => {
            const url = window.prompt(
                "Вставити YouTube відео за посиланням:",
                "https://www.youtube.com/watch?v=jNQXAC9IVRw"
            );
            if (url) {
                editor.commands.setYoutubeVideo({
                    src: url,
                    width: 640,
                    height: 480,
                });
            }
        });

        // typography dropdown
        const typographyDropdown = FlowbiteInstances.getInstance("Dropdown", "typographyDropdown");

        document.getElementById("toggleParagraphButton").addEventListener("click", () => {
            editor.chain().focus().setParagraph().run();
            typographyDropdown.hide();
        });

        document.querySelectorAll("[data-heading-level]").forEach((button) => {
            button.addEventListener("click", () => {
                const level = button.getAttribute("data-heading-level");
                editor
                    .chain()
                    .focus()
                    .toggleHeading({ level: parseInt(level) })
                    .run();
                typographyDropdown.hide();
            });
        });

        const textSizeDropdown = FlowbiteInstances.getInstance("Dropdown", "textSizeDropdown");

        // Loop through all elements with the data-text-size attribute
        document.querySelectorAll("[data-text-size]").forEach((button) => {
            button.addEventListener("click", () => {
                const fontSize = button.getAttribute("data-text-size");

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setMark("textStyle", { fontSize }).run();

                // Hide the dropdown after selection
                textSizeDropdown.hide();
            });
        });

        // Listen for color picker changes
        const colorPicker = document.getElementById("color");
        colorPicker.addEventListener("input", (event) => {
            const selectedColor = event.target.value;

            // Apply the selected color to the selected text
            editor.chain().focus().setColor(selectedColor).run();
        });

        document.querySelectorAll("[data-hex-color]").forEach((button) => {
            button.addEventListener("click", () => {
                const selectedColor = button.getAttribute("data-hex-color");

                // Apply the selected color to the selected text
                editor.chain().focus().setColor(selectedColor).run();
            });
        });

        document.getElementById("reset-color").addEventListener("click", () => {
            editor.commands.unsetColor();
        });

        const fontFamilyDropdown = FlowbiteInstances.getInstance("Dropdown", "fontFamilyDropdown");

        // Loop through all elements with the data-font-family attribute
        document.querySelectorAll("[data-font-family]").forEach((button) => {
            button.addEventListener("click", () => {
                const fontFamily = button.getAttribute("data-font-family");

                // Apply the selected font size via pixels using the TipTap editor chain
                editor.chain().focus().setFontFamily(fontFamily).run();

                // Hide the dropdown after selection
                fontFamilyDropdown.hide();
            });
        });

        // set up custom event listeners for the buttons
        document.getElementById("addTableButton").addEventListener("click", () => {
            editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run();
        });

        // add column before
        document.getElementById("addColumnBeforeButton").addEventListener("click", () => {
            editor.chain().focus().addColumnBefore().run();
        });

        // add column after
        document.getElementById("addColumnAfterButton").addEventListener("click", () => {
            editor.chain().focus().addColumnAfter().run();
        });

        // remove column
        document.getElementById("removeColumnButton").addEventListener("click", () => {
            editor.chain().focus().deleteColumn().run();
        });

        // add row before
        document.getElementById("addRowBeforeButton").addEventListener("click", () => {
            editor.chain().focus().addRowBefore().run();
        });

        // add row after
        document.getElementById("addRowAfterButton").addEventListener("click", () => {
            editor.chain().focus().addRowAfter().run();
        });

        // remove row
        document.getElementById("removeRowButton").addEventListener("click", () => {
            editor.chain().focus().deleteRow().run();
        });

        // delete table
        document.getElementById("deleteTableButton").addEventListener("click", () => {
            editor.chain().focus().deleteTable().run();
        });

        // merge cells
        document.getElementById("mergeCellsButton").addEventListener("click", () => {
            editor.chain().focus().mergeCells().run();
        });

        // split cells
        document.getElementById("splitCellsButton").addEventListener("click", () => {
            editor.chain().focus().splitCell().run();
        });

        // merge or split
        document.getElementById("mergeOrSplitButton").addEventListener("click", () => {
            editor.chain().focus().mergeOrSplit().run();
        });

        // toggle header column
        document.getElementById("toggleHeaderColumnButton").addEventListener("click", () => {
            editor.chain().focus().toggleHeaderColumn().run();
        });

        // toggle header row
        document.getElementById("toggleHeaderRowButton").addEventListener("click", () => {
            editor.chain().focus().toggleHeaderRow().run();
        });

        // toggle header cell
        document.getElementById("toggleHeaderCellButton").addEventListener("click", () => {
            editor.chain().focus().toggleHeaderCell().run();
        });

        const cellAttributeModal = FlowbiteInstances.getInstance("Modal", "cell-attribute-modal");

        document.getElementById("addCellAttributeForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const attributeName = document.getElementById("attribute-name").value;
            const attributeValue = document.getElementById("attribute-value").value;

            if (attributeName && attributeValue) {
                const result = editor.commands.setCellAttribute(
                    attributeName ? attributeName : "",
                    attributeValue ? attributeValue : ""
                );
                document.getElementById("addCellAttributeForm").reset();
                cellAttributeModal.hide();
            }
        });

        // fix tables
        document.getElementById("fixTablesButton").addEventListener("click", () => {
            editor.commands.fixTables();
        });

        // go to previous cell
        document.getElementById("previousCellButton").addEventListener("click", () => {
            editor.chain().focus().goToPreviousCell().run();
        });

        // go to the next cell
        document.getElementById("nextCellButton").addEventListener("click", () => {
            editor.chain().focus().goToNextCell().run();
        });
    }
});
