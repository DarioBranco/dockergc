from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class ev_model(Base):
	__tablename__ = 'ev_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	BatCap = Column(Text)
	BatCapNameplate = Column(Text)
	EffCharAC = Column(Text)
	EffDischarAC = Column(Text)
	EffCharDC = Column(Text)
	EffDischarDC = Column(Text)
	MaxChPwrAC = Column(Text)
	MaxChPwrDC = Column(Text)
	MaxDischPwrAC = Column(Text)
	MaxDischPwrDC = Column(Text)
