import { Editor, mergeAttributes, Node } from "@tiptap/core";
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

//'editor-ready' - event dispatched when Alpine.js is ready
window.addEventListener("editor-ready", function () {
    const initialContent =
        document.querySelector("#data-holder")?.dataset?.content || "<p>Йой! Сталася якась помилка!</p>";

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
        window.tiptapEditor = new Editor({
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
            content: initialContent,
            editorProps: {
                attributes: {
                    /*class: "flex flex-wrap format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none",*/
                    class: "grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 place-items-center format p-1 lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none ",
                },
            },
        });

        // set up custom event listeners for the buttons
        document
            .getElementById("toggleBoldButton")
            .addEventListener("click", () => window.tiptapEditor.chain().focus().toggleBold().run());
        document
            .getElementById("toggleItalicButton")
            .addEventListener("click", () => window.tiptapEditor.chain().focus().toggleItalic().run());
        document
            .getElementById("toggleUnderlineButton")
            .addEventListener("click", () => window.tiptapEditor.chain().focus().toggleUnderline().run());
        document
            .getElementById("toggleStrikeButton")
            .addEventListener("click", () => window.tiptapEditor.chain().focus().toggleStrike().run());
        document.getElementById("toggleHighlightButton").addEventListener("click", () => {
            const isHighlighted = window.tiptapEditor.isActive("highlight");
            // when using toggleHighlight(), judge if is is already highlighted.
            window.tiptapEditor
                .chain()
                .focus()
                .toggleHighlight({
                    color: isHighlighted ? undefined : "#ffc078", // if is already highlighted，unset the highlight color
                })
                .run();
        });

        document.getElementById("toggleLinkButton").addEventListener("click", () => {
            const url = window.prompt("Вставити посилання:", "https://example.com/");
            window.tiptapEditor.chain().focus().toggleLink({ href: url }).run();
        });
        document.getElementById("removeLinkButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().unsetLink().run();
        });
        document.getElementById("toggleCodeButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleCode().run();
        });
        document.getElementById("toggleLeftAlignButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setTextAlign("left").run();
        });
        document.getElementById("toggleCenterAlignButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setTextAlign("center").run();
        });
        document.getElementById("toggleRightAlignButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setTextAlign("right").run();
        });
        document.getElementById("toggleJustifyButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setTextAlign("justify").run();
        });
        document.getElementById("toggleListButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleBulletList().run();
        });
        document.getElementById("toggleOrderedListButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleOrderedList().run();
        });
        document.getElementById("toggleBlockquoteButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleBlockquote().run();
        });
        document.getElementById("toggleHRButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setHorizontalRule().run();
        });

        //add image:
        const advancedImageModal = FlowbiteInstances.getInstance("Modal", "advanced-image-modal");
        document.getElementById("advancedImageForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const imageUrl = document.getElementById("IMAGE-URL").value;
            const size = document.getElementById("rel-sizes-input").value;
            const imagePlacement = document.querySelector('input[name="img-placement"]:checked').id;

            let className = `rounded-lg !m-0 mx-auto`;

            if (imageUrl) {
                const endPos = window.tiptapEditor.state.doc.content.size;

                window.tiptapEditor
                    .chain()
                    .focus()
                    .setTextSelection(endPos)
                    .setImage({
                        src: imageUrl,
                        class: className,
                    })
                    .run();

                document.getElementById("advancedImageForm").reset();
                advancedImageModal.hide();
            }
        });

        //add gallery:
        const advancedVideoModal = FlowbiteInstances.getInstance("Modal", "add-gallery");

        document.getElementById("addGalleryForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const videoUrl = document.getElementById("URL").value;
            const videoWidth = document.getElementById("width").value || 0;
            const videoHeight = document.getElementById("height").value || 0;

            if (videoUrl) {
                const endPos = window.tiptapEditor.state.doc.content.size;

                window.tiptapEditor
                    .chain()
                    .focus()
                    .setYoutubeVideo({
                        src: videoUrl,
                        width: videoWidth ? videoWidth : 640,
                        height: videoHeight ? videoHeight : 480,
                    })
                    .setTextSelection(endPos)
                    .run();

                document.getElementById("addGalleryForm").reset();
                advancedVideoModal.hide();
            }
        });

        //undo
        document.getElementById("toggleUndoButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().undo().run();
        });
        //redo
        document.getElementById("toggleRedoButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().redo().run();
        });

        const sourceCodeWrapper = document.getElementById("sourceCode");
        document.getElementById("toggleHTMLButton").addEventListener("click", () => {
            // basically just use window.tiptapEditor.getHTML(); to get the raw html

            sourceCodeWrapper.innerHTML = window.tiptapEditor
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
                const endPos = window.tiptapEditor.state.doc.content.size;

                window.tiptapEditor
                    .chain()
                    .focus()
                    .setYoutubeVideo({
                        src: url,
                        width: 640,
                        height: 480,
                    })
                    .setTextSelection(endPos) // курсор в конец
                    .run();
            }
        });

        // typography dropdown
        const typographyDropdown = FlowbiteInstances.getInstance("Dropdown", "typographyDropdown");

        document.getElementById("toggleParagraphButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().setParagraph().run();
            typographyDropdown.hide();
        });

        document.querySelectorAll("[data-heading-level]").forEach((button) => {
            button.addEventListener("click", () => {
                const level = button.getAttribute("data-heading-level");
                window.tiptapEditor
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

                // Apply the selected font size via pixels using the TipTap window.tiptapEditor chain
                window.tiptapEditor.chain().focus().setMark("textStyle", { fontSize }).run();

                // Hide the dropdown after selection
                textSizeDropdown.hide();
            });
        });

        // Listen for color picker changes
        const colorPicker = document.getElementById("color");
        colorPicker.addEventListener("input", (event) => {
            const selectedColor = event.target.value;

            // Apply the selected color to the selected text
            window.tiptapEditor.chain().focus().setColor(selectedColor).run();
        });

        document.querySelectorAll("[data-hex-color]").forEach((button) => {
            button.addEventListener("click", () => {
                const selectedColor = button.getAttribute("data-hex-color");

                // Apply the selected color to the selected text
                window.tiptapEditor.chain().focus().setColor(selectedColor).run();
            });
        });

        document.getElementById("reset-color").addEventListener("click", () => {
            window.tiptapEditor.commands.unsetColor();
        });

        const fontFamilyDropdown = FlowbiteInstances.getInstance("Dropdown", "fontFamilyDropdown");

        // Loop through all elements with the data-font-family attribute
        document.querySelectorAll("[data-font-family]").forEach((button) => {
            button.addEventListener("click", () => {
                const fontFamily = button.getAttribute("data-font-family");

                // Apply the selected font size via pixels using the TipTap window.tiptapEditor chain
                window.tiptapEditor.chain().focus().setFontFamily(fontFamily).run();

                // Hide the dropdown after selection
                fontFamilyDropdown.hide();
            });
        });

        // set up custom event listeners for the buttons
        document.getElementById("addTableButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run();
        });

        // add column before
        document.getElementById("addColumnBeforeButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().addColumnBefore().run();
        });

        // add column after
        document.getElementById("addColumnAfterButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().addColumnAfter().run();
        });

        // remove column
        document.getElementById("removeColumnButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().deleteColumn().run();
        });

        // add row before
        document.getElementById("addRowBeforeButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().addRowBefore().run();
        });

        // add row after
        document.getElementById("addRowAfterButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().addRowAfter().run();
        });

        // remove row
        document.getElementById("removeRowButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().deleteRow().run();
        });

        // delete table
        document.getElementById("deleteTableButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().deleteTable().run();
        });

        // merge cells
        document.getElementById("mergeCellsButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().mergeCells().run();
        });

        // split cells
        document.getElementById("splitCellsButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().splitCell().run();
        });

        // merge or split
        document.getElementById("mergeOrSplitButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().mergeOrSplit().run();
        });

        // toggle header column
        document.getElementById("toggleHeaderColumnButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleHeaderColumn().run();
        });

        // toggle header row
        document.getElementById("toggleHeaderRowButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleHeaderRow().run();
        });

        // toggle header cell
        document.getElementById("toggleHeaderCellButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().toggleHeaderCell().run();
        });

        const cellAttributeModal = FlowbiteInstances.getInstance("Modal", "cell-attribute-modal");

        document.getElementById("addCellAttributeForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const attributeName = document.getElementById("attribute-name").value;
            const attributeValue = document.getElementById("attribute-value").value;

            if (attributeName && attributeValue) {
                const result = window.tiptapEditor.commands.setCellAttribute(
                    attributeName ? attributeName : "",
                    attributeValue ? attributeValue : ""
                );
                document.getElementById("addCellAttributeForm").reset();
                cellAttributeModal.hide();
            }
        });

        // fix tables
        document.getElementById("fixTablesButton").addEventListener("click", () => {
            window.tiptapEditor.commands.fixTables();
        });

        // go to previous cell
        document.getElementById("previousCellButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().goToPreviousCell().run();
        });

        // go to the next cell
        document.getElementById("nextCellButton").addEventListener("click", () => {
            window.tiptapEditor.chain().focus().goToNextCell().run();
        });
    }
});
