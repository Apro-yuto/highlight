import React from 'react'
import { Grid, Box } from '@mui/material'
import { InputUnstyled } from '@mui/base'
import { makeStyles } from '@mui/styles'

interface Props {
  label: string
  labelValue: string
}

const useStyles = makeStyles({
  labelWrap: {
    display: 'flex',
    width: '100%',
  },
  label: {
    width: '40%',
    '& > input': {
      lineHeight: 3.5,
      width: '100%',
      borderRadius: '40px 0px 0px 40px',
      borderRight: 'none',
      paddingLeft: '10px',
      backgroundColor: '#E0E0E0',
      color: '#7D7D7D',
    },
  },
  labelValue: {
    width: '60%',
    '& > input': {
      lineHeight: 3.5,
      width: '100%',
      borderRadius: '0px 40px 40px 0px',
      paddingLeft: '10px',
      color: '#7D7D7D',
    },
  },
})

const LabelInput: React.VFC<Props> = (props) => {
  const classes = useStyles(props)

  return (
    <Grid item xs={12} mt={4} lg={4}>
      <Box className={classes.labelWrap}>
        <InputUnstyled value={props.label} className={classes.label} />
        <InputUnstyled
          value={props.labelValue}
          className={classes.labelValue}
        />
      </Box>
    </Grid>
  )
}

export default LabelInput
