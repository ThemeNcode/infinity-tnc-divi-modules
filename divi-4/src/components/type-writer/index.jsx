// External Dependencies
import React, { Component } from 'react';
import Typewriter from 'typewriter-effect';


class TypeWriter extends Component {

    static slug = 'inftnc_type_writer';

    render() {
        const {
            before_text = '',
            typing_text = 'Typewriter|Typing Animation',
            after_text = '',
            typing_speed = 75,
            typing_backspeed = 75,
            pause_for = 1500,
            typing_cursor = '|',
            typing_loop = 'on',
            title_level = 'h1'
        } = this.props;

        const HeadingTag = title_level || 'h1';
        const typingText = (typing_text || 'Typewriter|Typing Animation').split("|").filter(t => t.trim() !== "");
        const loopValue = typing_loop === 'on';

        return (
            <div className="inftnc_typewriter_wrapper">
                <HeadingTag className="inftnc_typewriter_main_title">
                    <span className="inftnc_before_text">{before_text}</span>
                    <span className="inftnc_typewriter_text">
                        <Typewriter
                            options={{
                                strings: typingText,
                                autoStart: true,
                                loop: loopValue,
                                delay: parseInt(typing_speed) || 75,
                                deleteSpeed: parseInt(typing_backspeed) || 75,
                                pauseFor: parseInt(pause_for) || 1500,
                                cursor: typing_cursor,
                            }}
                        />
                    </span>
                    <span className="inftnc_after_text">{after_text}</span>
                </HeadingTag>
            </div>
        );
    }
}

export default TypeWriter;