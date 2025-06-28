import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Image from "@tiptap/extension-image";

//'editor-ready' - event dispatched when Alpine.js is ready
window.addEventListener("editor-ready", function () {
    const initialContent =
        document.querySelector("#data-holder")?.dataset?.content || "<p>Йой! Сталася якась помилка!</p>";

    const defaultGallery = " grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 place-items-center ";

    const masonryGrid = " grid grid-cols-2 md:grid-cols-4 gap-4 ";

    let editorClasses =
        defaultGallery + " format p-1 lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none ";

    if (document.getElementById("wysiwyg")) {
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
                CustomImage,
            ],
            content: initialContent,
            editorProps: {
                attributes: {
                    class: editorClasses,
                },
            },
        });

        // set up custom event listeners for the buttons

        //add image:
        const advancedImageModal = FlowbiteInstances.getInstance("Modal", "advanced-image-modal");
        document.getElementById("advancedImageForm").addEventListener("submit", (e) => {
            e.preventDefault();

            const imageUrl = document.getElementById("IMAGE-URL").value;

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
    }
});
